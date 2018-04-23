<?php
class User
{
	public $user;
	public $admins;
    public function __construct()
    {
     	$this->admins = $this->get_admins();   
    }

	function EncryptPassword($password, $email){
		$usersalt = md5($email); //Create user unique salt
		$encrypted_pass = crypt($password, '$2a$12$'.$usersalt.'$'); //Encrypt password using bCrypt
		return $encrypted_pass;
	}

    function get_all_user() {
    	global $database;
		$sql = "SELECT * From users";
		$result = $database->select_all_query( $sql );
		return $result;
    }

    function check_exist( $email ) {
    	global $database;
		$sql = 'SELECT * From users WHERE email="'.$email.'"';
		$result = $database->select_all_query( $sql );
		if ( $result ) {
			return true;
		} else {
			return false;
		}
    }

    function get_role_text( $role_id ) {
    	$role = 'Student';
    	switch ( $role_id ) {
    		case 0:
    			$role = 'Admin';
    			break;

    		case 1:
    			$role = 'Staff';
    			break;

    		case 2:
    			$role = 'Student';
    			break;

    		default:
    			$role = 'Student';
    			break;
    	}
    	return $role;
    }

    function delete_user( $user_id ) {
		global $database;
		$sql = 'DELETE FROM users WHERE id = "'.$user_id.'"';
		$database->execute_query( $sql );
	}

	function insert_user( $user ) {
		global $database;
		$password = $user['password'];
		$email = $user['email'];
		$encryptedpass = $this->EncryptPassword($password, $email);
		$sql = "INSERT INTO users( `display_name` , `password`, `email`, `role` )
		VALUES ('" . $user['display_name'] . "','".$encryptedpass."', '".$user['email']."', '".$user['role']."')";
		$database->execute_query( $sql );
	}

	function get_user_by_id( $user_id ) {
		global $database;
		$sql = "SELECT * From users WHERE id=".$user_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_admins() {
		global $database;
		$sql = "SELECT * From users WHERE role=0";
		$result = $database->select_all_query( $sql );
		return $result;
	}
}
$GLOBALS['user'] = new User();