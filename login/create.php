<?php
// get database connection
include_once '../config/database.php';

// instantiate wallet object
include_once '../login/login.php';

$database = new Database();
$db = $database->getConnection();

$login = new Login($db);

// make sure data is not empty
if (!empty($_POST['username']) && !empty($_POST['password'])) {
       
    if ($login->login()){
        // set response code - 201 created
        http_response_code(200);

        // tell the user
        //echo json_encode(array("message" => "Login is successful."));
        include_once 'C:\xampp\htdocs\sample_project\helpers\redirect\redirect.php';
        echo RedirectURL("/sample_project/dashboard/companies/companyList.html","Login Successful");    
    }
    }// tell the user data is incomplete
else {

    if (($_POST['username']=='') && ($_POST['password']=='')){
        // set response code - 403 created
         http_response_code(404);

        // tell the user
        echo json_encode(array("message" => "Unable to login. Username && password are missing."));
        }
    else if (($_POST['username']=='')){
        // set response code - 403 created
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to login. Username is missing."));
        } 
    else if (($_POST['password']=='')){
        // set response code - 403 created
        http_response_code(400);
        
        // tell the user
        echo json_encode(array("message" => "Unable to login. Password is missing."));
        } 
}
?>