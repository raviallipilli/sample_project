<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/employees/employee.php';
$database = new Database();
$db = $database->getConnection();
$employee = new Employee($db);
$employee->deleteEmployee();
?>

