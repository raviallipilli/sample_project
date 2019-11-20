<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/manufacturer/manufacturer.php';
$database = new Database();
$db = $database->getConnection();
$manufacturer = new Manufacturer($db);
$manufacturer->deleteManufacturer();
?>

