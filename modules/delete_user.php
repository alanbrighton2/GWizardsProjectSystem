<?php
	require("../database.php");
	require_once("../classes/_users.php");

	session_start();

	global $database,$deps;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	if ( 0 == $_SESSION['role'] ) {
		if ( $id && $id != '' ) {
			$user->delete_user( $id );
			header('Location: ../user.php');
			exit();
		} else {
			header('Location: ../user.php?status=error');
			exit();
		}
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}
?>