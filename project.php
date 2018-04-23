
<?php
include("header.php");
if ( $session ):
if ( '0' == $session['role'] || '1' == $session['role'] || '2' == $session['role'] ) {
?>
	<div id="content" class="tpl-full-width">
				<div id="main-container" class="clearfix">
					<div class="main container submit-container main-container" role="main">
						<div class="content-wrap">
							<div class="main-content container-fluid">
								<div class="col-xs-12 col-md-10">
						            <div class="panel panel-default">
					                    <h2 style="margin-bottom: 5px;">Projects</h2>
					                    <br>
										<div class="panel-body">
										<div class="filter-box">
											<?php $filter = isset( $_GET['filter'] ) ? $_GET['filter'] : 'all'; ?>

											<ul class="project-filter">
												<li>Filter:</li>
												<li><a href="?filter=all" class="<?php if ( 'all' == $filter ) echo 'active'; ?>">All</a> | </li>
												<?php if ( 0 == $_SESSION['role'] ) : ?>
													<li><a href="?filter=unapproved" class="<?php if ( 'unapproved' == $filter ) echo 'active'; ?>">Unapproved Projects</a> | </li>
												<?php endif; ?>
												<li><a href="?filter=your-project" class="<?php if ( 'your-project' == $filter ) echo 'active'; ?>">Your Projects</a> | </li>
												<li><a href="?filter=assigned" class="<?php if ( 'assigned' == $filter ) echo 'active'; ?>">Assigned Projects</a> | </li>
											</ul>
										</div>
											<?php
												$page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
												if ( 'unapproved' == $filter ) {
													if ( 0 == $_SESSION['role'] ) {
														$projects = $project->get_projects( $filter, $page );
													} else {
														$projects = null;
													}
												} else {
													$projects = $project->get_projects( $filter, $page );
												}
											?>
											<?php if ($projects): ?>
												<ul class="list-group list-group-flush">
												<?php foreach ( $projects as $p ): ?>
													<?php 
														$author = $user->get_user_by_id( $p['author'] );
													?>
													<li class="list-group-item">
														<div class="project-title">
															<a href="http://localhost/GWizardsSystem/project-single.php?id=<?php echo $p['id'] ?>"><?php echo $p['title'] ?></a>
															- By <?php echo $author['display_name'] ?>
														</div>
														<div class="project-info pull-right">
															<div class="dept">
																<?php
																	$cats = $project->get_cats( $p['id'] );
																?>
																<?php if ( $cats ): ?>

																	<?php foreach ( $cats as $cat ): ?>
																 		<a href="?cat=<?php echo $cat['id'] ?>" style="background-color: <?php echo $cat['color'] ?>" class="cat-rdr cat-tag p-com"><?php echo $cat['name']; ?></a>
															 		<?php endforeach ?> 
																<?php endif ?>
															</div>
															<div class="date-time"><?php echo date( "F j, Y", strtotime( $p['date'] ) ) ?></div>
															<?php $redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
															?>
															<?php if ( 0 == $_SESSION['role'] ) { ?>
																<?php if ( 'pending' == $p['status'] ): ?>
																	<div class="approve">
																		| <a onclick="return confirm('Do you really want to approve this project?')" href="modules/approve_project.php?redirect=<?php echo $redirect ?>&id=<?php echo $p['id'] ?>">Approve</a>
																	</div>
																<?php endif ?>
															<?php } ?>
															<?php if ( 0 == $_SESSION['role'] ) { ?>
																	<div class="delete">
																		| <a onclick="return confirm('Do you really want to delete this project?')" href="modules/delete_project.php?redirect=<?php echo $redirect ?>&id=<?php echo $p['id'] ?>">Delete</a>
																	</div>
															<?php } ?>
														</div>
													</li>
												<?php endforeach ?>
												</ul>
												<?php 

													$posts_per_page = 5;
													$offset = ( intval( $page) - 1 ) * $posts_per_page;

													if ( intval( $page ) > 1 ) {
														$lprev = '?filter='.$filter.'&page='.( intval( $page ) - 1 );
													} else {
														$lprev = 'javascript:void(0)';
													}

													if ( count( $projects ) == $posts_per_page ) {
														$lnext = '?filter='.$filter.'&page='.( intval( $page ) + 1 );
													} else {
														$lnext = 'javascript:void(0)';
													}

												?>
												<nav style="margin-top: 20px">
									                <ul class="pagination user-pagination">
									                    <li class="page-item previous">
									                    	<a class="page-link <?php if ( $lprev == "javascript:void(0)" ) echo "disabled";?>" href="<?php echo $lprev; ?>" <?php if ( $lprev == "javascript:void(0)" ) echo "disabled";?>><span aria-hidden="true">&larr;</span></a>
									                    </li>
									                    <li class="page-item next">
									                    	<a class="page-link <?php if ( $lnext == "javascript:void(0)" ) echo "disabled";?>" href="<?php echo $lnext; ?>" <?php if ( $lnext == "javascript:void(0)" ) echo "disabled";?>><span aria-hidden="true">&rarr;</span></a>

									                    </li>
									                </ul>
									            </nav>



											<?php endif ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>
<?php else: ?>
	<?php include("login.php"); ?>
<?php endif; ?>
<?php include("footer.php"); ?>