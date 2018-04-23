<?php
	require("../database.php");
	require("../functions.php");
	require_once("../classes/_project.php");
	require_once("../classes/_users.php");
	session_start();

	global $database,$project,$user;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	$redirect = isset( $_GET['redirect'] ) ? $_GET['redirect'] :null ;
	if ( 0 == $_SESSION['role'] ) {
		if ( $id && $id != '' ) {
			$project->approve_project( $id );
			// send email to author
			$approve_project = $project->get_project_by_id( $id );
			$author = $user->get_user_by_id( $approve_project['author'] );

			send_email( $author, $project_id, 'approve-project' );

			// send email to assignees
			$assignees_meta = $project->get_project_meta( $id, 'assignees', true );
			$assignees = array();
			foreach ( $assignees_meta as $ass ) {
				$assignee = $user->get_user_by_id( $ass );
				$assignees[] = $assignee;
			}

			send_email( $assignees , $id, 'assignees' );
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