<?php
include("../database.php");
include("../classes/_users.php");
session_start();

global $database,$user;

$email = $_POST['email'];
$password = $_POST['password'];
$encryptedpass = $user->EncryptPassword($password, $email);
$sql = 'SELECT users.* FROM users 
        WHERE email = "'.$email.'" 
            and password = "'.$encryptedpass.'"';

$results = $database->select_query($sql);
if( $results ){
        $_SESSION['login'] = 1; // 
        $display_name = $results['display_name'];
        if ( !$display_name || $display_name == '' ) {
            $display_name = $results['email'];
        }
        $_SESSION['display_name'] = $display_name;
        $_SESSION['id'] = $results['id'];
        $_SESSION['role'] = $results['role'];
    	header('Location: ../index.php');
		exit();
    }
else
{
	header('Location: ../login.php?login_fail=true');
	die();
}
?>