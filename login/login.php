<?php

class login
{

    // database connection and table name
    private $connection;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // insert into database
    function login()
    {
        if(isset($_POST['submit'])){
            $connection = mysqli_connect('localhost', 'root', '','my_db');
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $timestamp=date('Y-m-d H:i:s');
            if(!$connection){
            die("Database connection failed");
            }
            $query = "INSERT INTO users (email,password,timestamp)
            VALUES ('".$username."', '".$password."','$timestamp')";
            $username = htmlspecialchars(strip_tags($username));
            $password = htmlspecialchars(strip_tags($password));
            $timestamp = htmlspecialchars(strip_tags($timestamp));
            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":timestamp", $timestamp);
            $result = $stmt->execute();

            // execute query
            if ($result === true) {
                return true;
            } else {
             return false;
             }
             $connection->close();
         }
    }
}