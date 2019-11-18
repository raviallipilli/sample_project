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
                // make sure data is not empty
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
       
                    if ($_POST['username'] && $_POST['password']) {
                        // set response code - 201 created
                        http_response_code(200);

                        // tell the user
                        $msg = 'Login Successful';
                        header('Location: /sample_project/dashboard/companies/companyList.php?msg='.$msg);
                        exit;
                    }
                }// tell the user data is incomplete
                else {
                    if (($_POST['username']=='') && ($_POST['password']=='')){
                        echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                        echo "<div id=\"text\" style='color:red;border:0px;'><b style='border:0px;'>Login Failed-Username & Password are empty</b></div>
                        "; // success message
                        echo "<script type='text/javascript'>";
                        echo "$(function(){";
                        echo "$('#text').fadeOut(5000);";  
                        echo "});";
                        echo "</script>";
                    }
                    else if (($_POST['username']=='')){
                        echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                         echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Login Failed-Username is misssing</b></div>
                        "; // success message
                        echo "<script type='text/javascript'>";
                        echo "$(function(){";
                        echo "$('#text').fadeOut(5000);";  
                        echo "});";
                        echo "</script>";
                    } 
                    else if (($_POST['password']=='')){
                        echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                         echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Login Failed-Password is missing</b></div>
                        "; // success message
                        echo "<script type='text/javascript'>";
                        echo "$(function(){";
                        echo "$('#text').fadeOut(5000);";  
                        echo "});";
                        echo "</script>";
                    } 
                }
            } 
            else {
                 return false;
            }
            $connection->close();
        }
    }
}