<?php

class terms
{
    public function __construct()
    {
        
    }

    function get_all_terms() {
    	global $database;
		$sql = "SELECT * From terms";
		$result = $database->select_all_query( $sql );
		return $result;
    }


    function add_term( $word, $color ) {
        global $database;
        // $check = $this->check_exist( $word, 'name' );
        // if ( $check ) {
        //     header('Location: ../addcategory.php?status=error&code=exist');
        //     exit();
        // } else {
            // $slug = $this->slugify( $word );
            $sql = "INSERT INTO terms( `name`, `color` )
            VALUES ('" . $word . "', '" . $color . "')";
            $database->execute_query( $sql );
        // }
    }

    function _insert_terms( $name ) {
    	global $database;
    	$sql = "INSERT INTO terms( `name`  )
			VALUES ('" . $name . "')";
    	$result = $database->execute_query_return_result( $sql );
    	return $result;
    }

    function delete_term( $id ) {
        global $database;
        $sql = 'DELETE FROM terms WHERE id = "'.$id.'"';
        $database->execute_query( $sql );
    }
}
$GLOBALS['terms'] = new terms();