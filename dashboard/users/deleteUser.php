<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/users/user.php';
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->deleteUser();
?>

