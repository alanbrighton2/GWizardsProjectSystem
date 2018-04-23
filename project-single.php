
<?php
include("header.php");
if ( $session ):
$post_id = isset( $_GET['id'] ) ? $_GET['id'] : null;
$post = $project->get_project_by_id( $post_id );
?>

		<div id="content" class="tpl-full-width">
			<div id="main-container" class="clearfix">
				<div class="main container submit-container main-container" role="main">
					<div class="content-wrap">
						<div class="main-content container-fluid">
							<div class="col-xs-12 col-md-10">
					            <div class="panel panel-default panel-single">
					            	<?php if ( $post ) {
									if ( 'pending' == $post['status'] ) {
										Echo '<h3>This project is under review.</h3>';
										if ( '0' == $session['role'] ) { ?>
											<?php $redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
															?>
											You can approve this project <a style="text-decoration: underline!important;" onclick="return confirm('Do you really want to approve this project?')" href="modules/approve_project.php?redirect=<?php echo $redirect ?>&id=<?php echo $post['id'] ?>">here</a>
										<?php }
									} else { ?>
						                <div class="panel-heading">
						                    <h2><?php echo $post['title']; ?></h2>
						                    
						                </div>
										<div class="panel-body">
											<div class="entry-date">
						                    	<i class="single-icon icon-calendar"></i><div class="entry-alan"><?php echo date( "F j, Y", strtotime( $post['date'] ) ) ?></div>
						                    </div>
											<div class="entry-author">
												<?php 
													$author = $user->get_user_by_id( $post['author'] );
												?>
												<i class="single-icon icon-verified-user"></i>
												<?php echo '<div class="entry-alan">By: '.$author['display_name'].'</div>'; ?>
											</div>
											<div class="entry-assignee">
												<?php
													$assignees_meta = $project->get_project_meta( $post['id'], 'assignees', true );
													$assignees = array();
													foreach ( $assignees_meta as $ass ) {
														$assignee = $user->get_user_by_id( $ass );
														$assignees[] = $assignee['display_name'];
													}
												?>
												<i class="single-icon icon-buddyapp-members"></i>
												<div class="entry-alan">
													Assignees: <?php echo implode( ',', $assignees); ?>
												</div>
											</div>
											<div class="entry-category">
												<?php
													$cats = $project->get_cats( $post['id'] );
												?>
												<?php if ( $cats ): ?>
													<i class="single-icon icon-list2"></i>
													<div class="entry-alan">
													Category:
														<?php foreach ( $cats as $cat ): ?>
													 		<a href="?cat=<?php echo $cat['id'] ?>" style="background-color: <?php echo $cat['color'] ?>" class="cat-rdr cat-tag p-com"><?php echo $cat['name']; ?></a>
												 		<?php endforeach ?> 
													<?php endif ?>
													</div>
											</div>
											<div class="entry-descriptrion">
												<p><?php echo $post['description']; ?></p>
											</div>
										</div>
									<?php } ?>
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