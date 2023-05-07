<?php

// Replace these credentials with your own

define('DB_SERVER', 'Your_host_name');
define('DB_USERNAME', 'Your_username');
define('DB_PASSWORD', 'Your_password');
define('DB_DATABASE', 'your_database_name');

class DB 
{
    private $host       = DB_SERVER;
    private $username   = DB_USERNAME;
    private $password   = DB_PASSWORD;
    private $database   = DB_DATABASE;
    
    protected $Jigo;
    
    public function __construct(){

        if (!isset($this->Jigo)) {
            
            $this->Jigo = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->Jigo->connect_error) die('Database error -> ' . $this->Jigo->connect_error);           
        }
        return $this->Jigo;
    }
}
?>