<?php
	require("../database.php");
	require_once("../classes/_users.php");
	session_start();
	global $database,$user;
	if ( 0 == $_SESSION['role'] ) {
	$error = array();
	$display_name = isset( $_POST['display-name'] ) ? $_POST['display-name'] :null;

	$password = isset( $_POST['password'] ) ? $_POST['password'] :null;

	$email = isset( $_POST['email'] ) ? $_POST['email'] :null;
	if ( !$email ) {
		$error['email'] = 'email_null';
	}

	$email_check = $user->check_exist( $email );

	if ( $email_check ) {
		$error['email'] = 'email_exist';
	}

	// $email_format = $user->check_email_format( $email );

	// if ( !$email_check ) {
	// 	$error['email'] = 'email_format';
	// }

	$role = isset( $_POST['role'] ) ? $_POST['role'] :2;

	if ( count( $error ) > 0 ) {
		if ( $error['email'] ) {
			header('Location: ../add_user.php?status=error&code='.$error['email']);
		exit;
		}
	} else {
		$user_arr = array();
		$user_arr['display_name'] = $display_name;
		$user_arr['password'] = $password;
		$user_arr['email'] = $email;
		$user_arr['role'] = $role;
		$user->insert_user( $user_arr );
		header('Location: ../user.php');
		exit();
	}
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}
?>