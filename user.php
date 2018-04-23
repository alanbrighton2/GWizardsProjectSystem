<?php
include("header.php");
if ( $session ):
	if ( '0' == $session['role'] || '1' == $session['role'] ):
?>
			<div id="content" class="tpl-full-width">
				<div id="main-container" class="clearfix">
					<div class="main container submit-container main-container" role="main">
						<div class="content-wrap">
							<div class="main-content container-fluid">
								<div class="col-xs-12 col-md-10">
						            <div class="panel panel-default">
						            	<?php if ( '0' == $session['role'] ): ?>
							            	<div class="panel-heading" style="padding-left: 0px;">
							                    <a class="instance-submit" href="add_user.php">Create a User</a>
							                </div>
						         	   <?php endif;?>
					                    <h2 style="margin-bottom: 5px;">Users</h2>
										<div class="panel-body">
											<div class="pull-right" style="margin-bottom: 10px;">
											<input id="main-search" class="header-search" autocomplete="off" required="" type="text" name="s" value="" placeholder="Search user:">
											</div>
											<div>
												<table class="table table-hover" style="width: 100%">
													<thead>
													<tr>
														<th scope="col">#</th>
														<th scope="col">Display name</th>
														<th scope="col">Email Address</th>
														<th scope="col">Role</th>
														<?php if ( '0' == $session['role'] ): ?>
															<th scope="col">Action</th>
														<?php endif ?>
													</tr>
													</thead>
												  	<?php
												  		$users = $user->get_all_user();
												  	?>
												  	<?php if ($users): ?>
												  		<?php foreach ( $users as $u ): ?>
												  			<tr>
														      <th scope="row"><?php echo $u['id'] ?></th>
														      <td><?php echo $u['display_name'] ?></td>
														      <td><?php echo $u['email'] ?></td>
														      <td><?php echo $user->get_role_text( $u['role'] ) ?></td>
														      <?php if ( '0' == $session['role'] ): ?>
														      		<th scope="col">
														      			<?php if ( $session['id'] != $u['id'] ): ?>
														      				<a style="color: #A23232;" onclick="return confirm('Do you really want to delete the user?')" href="modules/delete_user.php?id=<?php echo $u['id'] ?>">Delete</a>
														      			<?php endif ?>
														      		</th>
															<?php endif ?>
														    </tr>
												  		<?php endforeach ?>
												  	<?php endif ?>
												</table>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php endif; ?>
<?php else: ?>
	<?php include("login.php"); ?>
<?php endif; ?>
<?php include("footer.php"); ?>