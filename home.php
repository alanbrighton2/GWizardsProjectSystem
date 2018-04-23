<style type="text/css">
	#sidemenu-wrapper {
		display: none;
	}
	#page-wrapper {
		width: 100%;
		padding: 0px;
	}
</style>
<div id="home" class="container" style="height: 100%">
	<div class="header-container">
		<div class="home-logo">
			<img src="assets/images/logo.png" alt="" style="position: absolute;z-index: 5" width="400">
		</div>
		<div style="position: absolute;z-index: 5;right: 100px;top: 50px;">
			<a id="home-login" href="login.php"><h3><i class="icon-my-profile"></i>  Login</h3></a>
		</div>
	</div>
	<div id="home-intro">
		<h1>Welcome to GWizards System!</h1>
		<h3>This system is for Staff and Students from the University of Greenwich.</h3>
		<h3>It is used for the management of final year projects</h3>
		<br>
		<h3>Become a member of the system by signing up below</h3>
		<form>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" placeholder="First and Last Name, for example: Alan SW Wong">
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email" placeholder="University Email Address, for example: sw3456q@greenwich.ac.uk">
			</div>
			<div class="form-group">
				<label for="email">Student Number:</label>
				<input type="email" class="form-control" id="email" placeholder="Student Number, for example: 000772893">
			</div>
			<br>
			<div class="form-group">
				<label for="subject">Required Role:</label>
				<select name="role" id="role-select">
				<option value="2">Student</option>
				<option value="1">Staff</option>
														<!-- <option value="0">Admin</option> -->
				</select>
			</div>
			<br>
			<button type="submit" style="background-color: #717171;padding: 2px;margin-top: 2px;padding-bottom: 2px">Contact Us</button>
		</form>
	</div>
	<div class="stars"></div>
	<div class="twinkling"></div>
	<div class="clouds"></div>
</div>