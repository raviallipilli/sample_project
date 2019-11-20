<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/users/user.php';
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->deleteUser();
?>

