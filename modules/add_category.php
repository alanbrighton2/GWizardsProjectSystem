<?php
	require("../database.php");
	require_once("../classes/_terms.php");
	session_start();
	global $database,$terms;

	$cat_name = isset( $_POST['cat-name'] ) ? $_POST['cat-name'] :null ;
	$cat_color = isset( $_POST['cat-color'] ) ? $_POST['cat-color'] :null ;
	if ( 0 == $_SESSION['role'] ) {
		if ( $cat_name && $cat_name != '' ) {
			$terms->add_term( $cat_name, $cat_color );
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