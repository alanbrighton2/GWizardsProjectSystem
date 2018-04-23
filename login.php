<?php include("header.php"); ?>
<div id="content" class="tpl-full-width">
	<div id="main-container" class="clearfix">
		<div class="main container submit-container main-container" role="main">
			<div class="content-wrap">
				<div class="main-content container-fluid">
					<div class="col-xs-12 col-md-12">
			            <div class="panel panel-default">
						    <div class="row">
								<form method="POST" action="modules/login.php" class="form-horizontal">
									<div class="panel-heading">
					                    <h2>Login to the System</h2>
					                    
					                </div>
									<div class="form-group">
										<label class="col-sm-3" for="attachment">Email Address</label>
										<div class="col-sm-9">
											<input type="email" name="email" placeholder="Use the email you that registered to the system with" class="form-control"></input>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3" for="attachment">Password</label>
										<div class="col-sm-9">
											<input type="password" name="password" placeholder="Use the unique password provided to you by the Admin" class="form-control" ></input>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3" for=""></label>
										<div class="col-sm-9">
											<button id="idea-submit" type="submit" class="btn btn-primary submit-button">Login</button>
											<?php
						                    	$fail = isset( $_GET['login_fail'] ) ? $_GET['login_fail'] : null;
						                    	if ( $fail ) {
						                    		echo '<h4>Login Fail</h4>';
						                    	}
						                    ?>
										</div>

									</div>
								</form>
							    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>