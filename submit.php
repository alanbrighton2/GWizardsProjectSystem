
<?php
include("header.php");
if ( $session ):
if ( '0' == $session['role'] || '1' == $session['role'] ) {
?>
		<div id="content" class="tpl-full-width">
			<div id="main-container" class="clearfix">
				<div class="main container submit-container main-container" role="main">
					<div class="content-wrap">
						<div class="main-content container-fluid">
							<div class="col-xs-12 col-md-10">
					            <div class="panel panel-default">
					                <div class="panel-heading">
					                    <h2>Create a Project</h2>
					                </div>
									<div class="panel-body">
										<form method="POST" action="" class="form-horizontal">
											<div class="form-group title-group">
												<label class="col-sm-3" for="">Project Title</label>
												<div class="col-sm-9 title-input">
													<input type="text" name="project-name" class="form-control" placeholder="The name of your project" id="project-title">
												</div>
											</div>
											<div class="form-group desc-group">
												<label class="col-sm-3" for="project-description">Description</label>
												<div class="col-sm-9 desc-input">
													<textarea name="project-description" class="form-control" style="width: 100%; min-height: 100px" rows="5" id="project-desc" placeholder="Any information you can provide about your project"></textarea>
												</div>
											</div>
											<!-- the topic and department can be show when access from linh with query parameters/ improve -->
											<div class="form-group">
												<label class="col-sm-3" for="department">Assign to</label>
												<div class="col-sm-4">
													<?php
														$assignees = $user->get_all_user();
													?>
													<?php if ( $assignees ): ?>
														<select name="asignee[]" id="project-assignee" data-placeholder="Choose assignees" multiple="" class="form-control" data-action="assignee-change">
															<?php foreach ( $assignees as $assignee ): ?>
																<option value="<?php echo $assignee['id'] ?>"><?php echo $assignee['display_name']; ?></option>
															<?php endforeach ?>
														</select>
													<?php endif ?>
												</div>
											</div>
											<!-- -->
											<div class="form-group">
												<label class="col-sm-3" for="category">Choose Categories</label>
												<div class="col-sm-4">
													<?php
														$categories = $terms->get_all_terms();
													?>
													<?php if ( $categories ): ?>
														<select name="category[]" data-placeholder="Choose categories" multiple="" id="project-cat" class="form-control">
															<?php foreach ( $categories as $cat ): ?>
																<option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
															<?php endforeach ?>
														</select>
														<?php endif ?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3" for="category">Attachment</label>
												<div class="col-sm-4">
													<input type="file"></input>
												</div>
											</div>
											<div class="form-group">
												<label class="form-check-label col-sm-3" for="term">Terms And Conditions</label>
												<div class="col-sm-9">
													<div class="term-condition">
														<h4><strong>Terms and Conditions</strong></h4>
														<p>This section contains the terms and conditions for using the GWizards Project Management system. You must agree to these before you can submit a project.<p>
														<br>

														<p>You must agree to only using GWizards system for academic purposes. You must use the system in a way that it does not infringe upon any other users experience on the system<p>
														<br>
														<p>If there is any innapropriate or offensive content please contact the Admin by emailing him using: sw3456q@greenwich.ac.uk. Send up a URL or image of the sensitve material and explain why you think it should be removed.</p>
														<br>
														<p>It is in our interests to maintain a high standard of proffesional material in the system. We quality check any submissions before they go live although we cannot guarantee that mistakes can be made.</p>
														<br>
														<p>We are not responsible for any loss of data or what may happen to your computer system as a result of viruses. It is up to you to have your anti virus service on at all times.</p>
														<br>
														<p>GWizards terms and conditions are subject to change without notice. It is in your best interest to read them whenever you use our services.</p>
													</div>
													<input type="checkbox" class="form-check-input" name="term-condition" id="term-condition-check"> <strong>I agree to these terms and conditions<strong>.
												</div>
											</div>
											<input type="hidden" id="user-id" value="1">
											<button id="project-submit" type="submit" class="pull-right btn btn-primary submit-button">Submit</button>
										</form>
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