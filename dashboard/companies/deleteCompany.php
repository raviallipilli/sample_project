<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/companies/company.php';
$database = new Database();
$db = $database->getConnection();
$company = new Company($db);
$company->deleteCompany();
?>

