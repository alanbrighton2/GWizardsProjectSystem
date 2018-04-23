<div id="content" class="tpl-full-width">
	<div id="main-container" class="clearfix">
		<div class="main container submit-container main-container" role="main">
			<div class="content-wrap">
				<div class="main-content container-fluid">
					<div class="col-xs-12 col-md-12">
			            <div class="panel panel-default">
			            	<?php if ( '0' == $session['role'] ): ?>
				            	<div class="panel-heading">
				                    <a class="instance-submit" href="submit.php">Create a Project</a>
				                </div>
		           			<?php endif; ?>
			               <div class="project-list">
			               		<div>
				               		<h3>
				               		<a class="btn btn-primary" data-toggle="collapse" href="#newprojects" role="button" aria-expanded="false" aria-controls="newprojects">
									    <i class="icon-keyboard-arrow-down"></i>New Projects</a>
									</a>
				               		</h3>
			               		</div>
			               		<div class="collapse in" id="newprojects">
			               			<?php 
			               				$new_projects = $project->get_projects( 'all', 1 );
			               			?>
			               			<?php if ( $new_projects ): ?>
			               				<ul class="list-group list-group-flush">
				               				<?php foreach ( $new_projects as $new_project ): ?>
				               					<?php 
													$author = $user->get_user_by_id( $new_project['author'] );
												?>
				               				 	<li class="list-group-item">
													<div class="project-title">
														<a href="http://localhost/GWizardsSystem/project-single.php?id=<?php echo $new_project['id'] ?>"><?php echo $new_project['title'] ?></a>
															- By <?php echo $author['display_name'] ?>
													</div>
													<div class="project-info pull-right">
														<div class="dept">
																<?php
																	$cats = $project->get_cats( $new_project['id'] );
																?>
																<?php if ( $cats ): ?>

																	<?php foreach ( $cats as $cat ): ?>
																 		<a href="http://localhost/GWizardsSystem/project.php?cat=<?php echo $cat['id'] ?>" style="background-color: <?php echo $cat['color'] ?>" class="cat-rdr cat-tag p-com"><?php echo $cat['name']; ?></a>
															 		<?php endforeach ?> 
																<?php endif ?>
															</div>
														<div class="date-time"><?php echo date( "F j, Y", strtotime( $new_project['date'] ) ) ?></div>
													</div>
												</li>
				               				<?php endforeach ?>
			               				</ul>
			               			<?php endif ?>
		               				<li class="list-group-item">
										<a href="http://localhost/GWizardsSystem/project.php" style="font-size: 12px; color: #3232FF">See more projects...</a>
									</li>
								</div>
			               </div>
			               <div class="project-list">
			               		<div>
			               			<h3>
				               		<a class="btn btn-primary" data-toggle="collapse" href="#myprojects" role="button" aria-expanded="false" aria-controls="myprojects">
									    <i class="icon-keyboard-arrow-down"></i>My Projects</a>
									</a>
				               		</h3>
			               		</div>
			               		<div class="collapse in" id="myprojects">
				               		<?php 
			               				$your_projects = $project->get_projects( 'your-project', 1 );
			               			?>
			               			<?php if ( $your_projects ): ?>
			               				<ul class="list-group list-group-flush">
				               				<?php foreach ( $your_projects as $your_project ): ?>
				               					<?php 
													$author = $user->get_user_by_id( $your_project['author'] );
												?>
				               				 	<li class="list-group-item">
													<div class="project-title">
														<a href="http://localhost/GWizardsSystem/project-single.php?id=<?php echo $your_project['id'] ?>"><?php echo $your_project['title'] ?></a>
															- By <?php echo $author['display_name'] ?>
													</div>
													<div class="project-info pull-right">
														<div class="dept">
																<?php
																	$cats = $project->get_cats( $your_project['id'] );
																?>
																<?php if ( $cats ): ?>

																	<?php foreach ( $cats as $cat ): ?>
																 		<a href="http://localhost/GWizardsSystem/project.php?cat=<?php echo $cat['id'] ?>" style="background-color: <?php echo $cat['color'] ?>" class="cat-rdr cat-tag p-com"><?php echo $cat['name']; ?></a>
															 		<?php endforeach ?> 
																<?php endif ?>
															</div>
														<div class="date-time"><?php echo date( "F j, Y", strtotime( $your_project['date'] ) ) ?></div>
													</div>
												</li>
				               				<?php endforeach ?>
			               				</ul>
			               			<?php endif ?>
		               				<li class="list-group-item">
										<a href="http://localhost/GWizardsSystem/project.php" style="font-size: 12px; color: #3232FF">See more projects...</a>
									</li>
								</div>
			               </div>
							<div class="project-list">
			               		<div>
			               			<h3>
				               		<a class="btn btn-primary" data-toggle="collapse" href="#assignedprojects" role="button" aria-expanded="false" aria-controls="assignedprojects">
									    <i class="icon-keyboard-arrow-down"></i>Assigned Projects</a>
									</a>
				               		</h3>
			               		</div>
			               		<div class="collapse in" id="assignedprojects">
				               		<?php 
			               				$assigned_projects = $project->get_projects( 'assigned', 1 );
			               			?>
			               			<?php if ( $assigned_projects ): ?>
			               				<ul class="list-group list-group-flush">
				               				<?php foreach ( $assigned_projects as $assigned_project ): ?>
				               					<?php 
													$author = $user->get_user_by_id( $assigned_project['author'] );
												?>
				               				 	<li class="list-group-item">
													<div class="project-title">
														<a href="http://localhost/GWizardsSystem/project-single.php?id=<?php echo $assigned_project['id'] ?>"><?php echo $assigned_project['title'] ?></a>
															- By <?php echo $author['display_name'] ?>
													</div>
													<div class="project-info pull-right">
														<div class="dept">
																<?php
																	$cats = $project->get_cats( $assigned_project['id'] );
																?>
																<?php if ( $cats ): ?>

																	<?php foreach ( $cats as $cat ): ?>
																 		<a href="http://localhost/GWizardsSystem/project.php?cat=<?php echo $cat['id'] ?>" style="background-color: <?php echo $cat['color'] ?>" class="cat-rdr cat-tag p-com"><?php echo $cat['name']; ?></a>
															 		<?php endforeach ?> 
																<?php endif ?>
															</div>
														<div class="date-time"><?php echo date( "F j, Y", strtotime( $assigned_project['date'] ) ) ?></div>
													</div>
												</li>
				               				<?php endforeach ?>
			               				</ul>
			               			<?php endif ?>
		               				<li class="list-group-item">
										<a href="http://localhost/GWizardsSystem/project.php" style="font-size: 12px; color: #3232FF">See more projects...</a>
									</li>
								</div>
			               </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
