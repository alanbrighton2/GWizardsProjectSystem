<?php
// this data base is used to connect to the system
// and allows the sql functions (insert delete etc)
class database 
{
	var $connection = null; 
    private static $db = null;
    function connect()
    {
        // require("config.php"); // include config
        $hostname = "localhost"; //hosting
        $dbuser = "root";   // database
        $dbpass = "";    // password when install Xampp or wampp
        $dbname = "GWizards"; // databasename
        
        if($this->connection == null)
        {
            $this->connection = mysqli_connect($hostname,$dbuser,$dbpass,$dbname);
            if(!$this->connection)
    		{
    			die("Websie is on maintain, please comeback later");
    		}
            else    mysqli_query($this->connection,'set names utf8'); 
        }
    }

    public static function get_instance() // get global database object
    {
        if (self::$db==null)
        {
            self::$db = new database();
        }
        return self::$db;
    }

    function disconnect()
    {
        mysqli_close($this->connection); 
        $this->connection = null;  
    }
    
    function select_all_query($sql) 
    {
        
        if($sql != '') 
        {
            $this->connect(); 
            $list = mysqli_query($this->connection,$sql);
            $result = array();
            if( mysqli_num_rows($list) > 0)
            {
                while($row = mysqli_fetch_array($list,MYSQLI_ASSOC))
                {
                    $result[] = $row;
                }            
                $this->disconnect();
                return $result;
                
            }
            else
            {
                return false;
            }
        }
            
           
    }
    
    function select_query($sql)
    {
        if($sql != '')
        {
            $this->connect();
            $list = mysqli_query($this->connection,$sql);
            $result = array();
            if(mysqli_num_rows($list) > 0)
            {
                while($row = mysqli_fetch_array($list,MYSQLI_ASSOC))
                {
                    $result[] = $row;
                }
                //$this->disconnect();
                return $result[0];
            }
            else
            {
                return false;
            }
        }
    }
    
    function execute_query($sql)
    {
        if($sql != '')
        {
            $this->connect();
            $execute = mysqli_query($this->connection,$sql);
            if($execute)
            {
                //$this->disconnect();
                return true;
            }
            else
            {
                $this->disconnect();
                return false;
            }
            
        }
    }

    function execute_query_return_result($sql)
    {
        if($sql != '')
        {
            $this->connect();
            $execute = mysqli_query($this->connection,$sql);
            if($execute)
            {   
                $id = $this->connection->insert_id;
                $this->disconnect();
                return $id;
            }
            else
            {
                $this->disconnect();
                return false;
            }
            
        }
    }
}
$GLOBALS['database'] = new database();
?>