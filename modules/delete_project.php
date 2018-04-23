<?php
	require("../database.php");
	require_once("../classes/_project.php");

	session_start();

	global $database,$project;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	$redirect = isset( $_GET['redirect'] ) ? $_GET['redirect'] :null ;
	if ( 0 == $_SESSION['role'] ) {
		if ( $id && $id != '' ) {
			$project->delete_project( $id );
			header('Location: '.$redirect);
			exit();
		} else {
			header('Location: '.$redirect.'?status=error');
			exit();
		}
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}
?>