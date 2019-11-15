<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/companies/company.php';
$database = new Database();
$db = $database->getConnection();
$company = new Company($db);
$company->deleteCompany();
?>

