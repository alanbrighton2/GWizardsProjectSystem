<?php
include("header.php");
if ( $session ):
		if ( 0 == $session['role'] ) {
?>

			<div id="content" class="tpl-full-width">
				<div id="main-container" class="clearfix">
					<div class="main container submit-container main-container" role="main">
						<div class="content-wrap">
							<div class="main-content container-fluid">
								<div class="col-xs-12 col-md-10">
						            <div class="panel panel-default">
											<h3> Create a New User </h3>
											<form method="POST" action="modules/add_user.php">
												<div class="form-group">
													<label for="display-name">Display Name</label>
													<input type="display-name" name="display-name" class="form-control" id="display-name">
												</div>
												<div class="form-group">
													<label for="password">Password</label>
													<input type="text" name="password" class="form-control" id="password">
													<button id="generate-password">Generate Password</button>
												</div>
												<div class="form-group">
													<label for="email">Email</label>
													<input type="email" name="email" class="form-control" id="email">
													<?php $status = isset( $_GET['status'] ) ? $_GET['status'] : null; ?>
													<?php if ( $status && $_GET['code'] ):
														$code = isset( $_GET['code'] ) ? $_GET['code'] : null;
														if ( $code ) {
															if ( 'email_null' == $code ) { ?>
																<div class="alert alert-danger" role="alert">
																	<i>You need to input email!</i>
																</div>
															<?php } else if ( 'email_exist' == $code  ) { ?>
																<div class="alert alert-danger" role="alert">
																	<i>Email already exist.</i>
																</div>
															<?php }
														}
													endif; ?>
												</div>
												<div class="form-group">
													<label for="role">Role</label>
													</br>
													<select name="role" id="role-select">
														<option value="2">Student</option>
														<option value="1">Staff</option>
														<!-- <option value="0">Admin</option> -->
													</select>
												</div>
												<button type="submit" class="btn btn-default">Add</button>
											</form>
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