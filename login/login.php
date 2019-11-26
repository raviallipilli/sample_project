<?php
session_start();

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
            $connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $email = mysqli_real_escape_string($connection, $_POST['username']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            $timestamp=date('Y-m-d H:i:s');
            if(!$connection){
            die("Database connection failed");
            }
          
            $password = md5($password);
            // a user does not already exist with the same username and/or email
            $query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
            
            $username = htmlspecialchars(strip_tags($username));
            $password = htmlspecialchars(strip_tags($password));
            $timestamp = htmlspecialchars(strip_tags($timestamp));
            $stmt = $this->connection->prepare($query);
    
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":timestamp", $timestamp);
            $result = $stmt->execute();
            $result=$connection->query($query);

            // execute query
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $role_id=$row['role_id'];
                    $_SESSION["role_id"] = $role_id;
                // make sure data is not empty
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                        // set response code - 201 created
                        http_response_code(200);
                        //session_start();
                        $loginname = $_POST["username"];
                        $password = $_POST["password"];
                        //admin
                        if ($_SESSION["role_id"] == '1'){
                            // Check the correct login (for example with a database)
                            if ($loginname && $password) {
                                $_SESSION["username"] = $loginname;
                                $_SESSION["logged"] = true;
                                $msg = 'Login Successful';
                                header('Location: /sample_project/dashboard/companies/companyList.php?user='.$_SESSION["username"].'&msg='.$msg);
                                exit;
                            }
                            else {
                                header('Location: /sample_project/login/login/index.php');
                                exit;
                            }
                        }
                        // manager
                        else if ($_SESSION["role_id"] == '2'){
                             // Check the correct login (for example with a database)
                             if ($loginname && $password) {
                                $_SESSION["username"] = $loginname;
                                $_SESSION["logged"] = true;
                                $msg = 'Login Successful';
                                header('Location: /sample_project/dashboard/companies/companyList.php?user='.$_SESSION["username"].'&msg='.$msg);
                                exit;
                            }
                            else {
                                header('Location: /sample_project/login/login/index.php');
                                exit;
                            }
                        }
                        // employee
                        else if ($_SESSION["role_id"] == '3'){
                             // Check the correct login (for example with a database)
                             if ($loginname && $password) {
                                $_SESSION["username"] = $loginname;
                                $_SESSION["logged"] = true;
                                $msg = 'Login Successful';
                                header('Location: /sample_project/dashboard/manufacturer/manufacturerList.php?user='.$_SESSION["username"].'&msg='.$msg);
                                exit;
                            }
                            else {
                                header('Location: /sample_project/login/login/index.php');
                                exit;
                            }
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
        }
            else {
                echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Login Failed - You are not registered user. Please Register!</b></div>
                "; // success message
                echo "<script type='text/javascript'>";
                echo "$(function(){";
                echo "$('#text').fadeOut(50000);";  
                echo "});";
                echo "</script>";
            }
            $connection->close();
        }
    }

    // register user
    function register()
    {
        if (isset($_POST['submit'])) {
            $connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
            $username = mysqli_real_escape_string($connection, $_POST['username']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
            $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);
            $createdAt=date('Y-m-d H:i:s');
            $createdAt = htmlspecialchars(strip_tags($createdAt));

            // validating form ensure that the form is correctly filled ...
            if (empty($username)) 
            { 
                echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Registration failed - Username is missing!</b></div>
                "; // success message
                echo "<script type='text/javascript'>";
                echo "$(function(){";
                echo "$('#text').fadeOut(50000);";  
                echo "});";
                echo "</script>";
            }
            if (empty($email)) 
            { 
                echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Registration failed - Email is missing!</b></div>
                "; // success message
                echo "<script type='text/javascript'>";
                echo "$(function(){";
                echo "$('#text').fadeOut(50000);";  
                echo "});";
                echo "</script>";
            }
            if (empty($password_1)) 
            { 
                echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Registration failed - Password is missing!</b></div>
                "; // success message
                echo "<script type='text/javascript'>";
                echo "$(function(){";
                echo "$('#text').fadeOut(50000);";  
                echo "});";
                echo "</script>"; 
            }
            if ($password_1 != $password_2) 
            {
                echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Registration failed - Two passwords do not match!</b></div>
                "; // success message
                echo "<script type='text/javascript'>";
                echo "$(function(){";
                echo "$('#text').fadeOut(50000);";  
                echo "});";
                echo "</script>";
            }

            // checking if user exists in the database with same username or email 
            $query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($connection, $query);
            $user = mysqli_fetch_assoc($result);
  
            if ($user) { // if user exists
                if ($user['username'] === $username) {
                    echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                    echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Registration failed - Username already exists!</b></div>
                    "; // success message
                    echo "<script type='text/javascript'>";
                    echo "$(function(){";
                    echo "$('#text').fadeOut(50000);";  
                    echo "});";
                    echo "</script>";
                }

                if ($user['email'] === $email) {
                    echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                    echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Registration failed - Email already exists!</b></div>
                    "; // success message
                    echo "<script type='text/javascript'>";
                    echo "$(function(){";
                    echo "$('#text').fadeOut(50000);";  
                    echo "});";
                    echo "</script>";
                }
            }

            // register user if there are no users in the database
            if ($user == false) {
  	            $password = md5($password_1);//encrypting the password before saving in the database

  	            $query = "INSERT INTO users (username, email, password,timestamp) 
  			              VALUES('$username', '$email', '$password', '$createdAt')";
                mysqli_query($connection, $query);
                $select = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
                $roleResult=$connection->query($select);
                while($row = $roleResult->fetch_assoc()) {
                    $role_id=$row['role_id'];
                    $_SESSION["role_id"] = $role_id;
                }
  	            $_SESSION['username'] = $username;
  	            $_SESSION['success'] = "You are now registered. Please use your credentials to Login";
                header('Location: /sample_project/login/login/index.php?user='.$_SESSION["username"].'&msg='.$_SESSION['success']);  
                exit;              
            }
            else {
                echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>";
                echo "<div id=\"text\" style='color:red;'><b style='border:0px;'>Login Failed - User already exits with same username or email. Please use a different username and email!</b></div>
                "; // success message
                echo "<script type='text/javascript'>";
                echo "$(function(){";
                echo "$('#text').fadeOut(50000);";  
                echo "});";
                echo "</script>";
            }
            $connection->close();
        }
    }   
}