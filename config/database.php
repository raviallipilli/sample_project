<?php
class Database{

    // specify your own database credentials
    // private $host = "localhost";
    // private $db_name = "my_db";
    // private $username = "root";
    // private $password = "";
    // public $conn;

    //  // specify your ftp database credentials
     private $host = "localhost";
     private $db_name = "id11609533_my_db";
     private $username = "id11609533_root";
     private $password = "admin";
     public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>