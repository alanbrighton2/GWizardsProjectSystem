<?php
	require("../database.php");
	require_once("../classes/_terms.php");

	session_start();
	global $database,$terms;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	if ( 0 == $_SESSION['role'] ) {
		if ( $id && $id != '' ) {
			$terms->delete_term( $id );
			header('Location: ../add_category.php');
			exit();
		} else {
			header('Location: ../add_category.php?status=error');
			exit();
		}
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}
?>