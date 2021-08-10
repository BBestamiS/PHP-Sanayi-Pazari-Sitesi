<?php

class DBController
{
    private $serverName = "localhost";
    private $dbUserName = "root";
    private $dbPassword = "";
    private $dbName = "project";

    private $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->serverName, $this->dbUserName, $this->dbPassword, $this->dbName);
        if($this->conn->connect_error){
            echo "Fail" . $this->conn->connect_error;
        }
    }
    public function get_conn(){
        return $this->conn;
    }
    public function __destruct(){
        $this->closeConnection();
    }
   protected function closeConnection(){
       if($this->conn != null){
           $this->conn->close();
           $this->conn = null;
       }
   }
}
