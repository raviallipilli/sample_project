<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/manufacturer/manufacturer.php';
$database = new Database();
$db = $database->getConnection();
$manufacturer = new Manufacturer($db);
$manufacturer->deleteManufacturer();
 ?>

