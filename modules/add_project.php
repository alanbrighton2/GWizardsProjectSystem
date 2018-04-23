<?php
	require("../database.php");
	require("../functions.php");
	require_once("../classes/_project.php");
	require_once("../classes/_users.php");
	session_start();
	global $database,$project,$users;
	if ( 0 == $_SESSION['role'] || 1 == $_SESSION['role'] ) {
	$error = array();

	$title = isset( $_POST['title'] ) ? $_POST['title'] :null;
	$desc = isset( $_POST['desc'] ) ? $_POST['desc'] :null;
	$assignee = isset( $_POST['assignee'] ) ? $_POST['assignee'] :null;
	$cat = isset( $_POST['cat'] ) ? $_POST['cat'] :null;
	$author = $_SESSION['id'];

	$project_arr = array();
	$project_arr['title'] = $title;
	$project_arr['desc'] = $desc;
	$project_arr['assignee'] = $assignee;
	$project_arr['cat'] = $cat;
	$project_arr['author'] = $author;
	$project_arr['status'] = 'pending';
	$project_id = $project->insert_project( $project_arr );
	$admins = $user->admins;
	send_email( $admins, $project_id, 'new-project' );
	echo json_encode( array( 'redirect' => $project_id ) );
		exit();
	} else {
		echo json_encode( array( 'error' => true ) );
	exit();
	}
?>