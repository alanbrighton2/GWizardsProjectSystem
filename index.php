<?php
// this means that the index should include the header file
include("header.php");
// this code checks the session
// if the user has logged in there is a session and the system will display all files
// if there is no user then there is no session display and it will show the login form page
	if ( $session ):
		$search = isset( $_GET['s'] ) ? $_GET['s'] : null;
		if ($search) {
			include("search.php");
		} else {
			include("dashboard.php");
		}
		
	else:
		include("home.php");
	endif;
include("footer.php");