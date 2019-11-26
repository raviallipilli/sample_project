<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>
<link rel="stylesheet" href="/sample_project/css/employeeList.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script type='text/javascript' src="/sample_project/js/employee.js"></script>

<!-- display message for CRUD operations-->
<div id="msg"><b><?php if (isset($_GET['msg'])) echo $_GET['msg'];?></b></div>
<div class="container">
    <h1>Employees List</h1>
</div>
<div class="container">
<form class="form-group" action="employeeList.php" method="post">
      <input class="form-control" type="text" placeholder="Search.." name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search'];?>">
      <button style="width:auto;" class="btn btn-secondary" name="submit" type="submit">Search</i></button>
      <button style="width:auto;" type="button" class="btn btn-success" onClick="document.location.href='/sample_project/dashboard/employees/addEmployeePage.php';">Add Employee</button>
    </form>
</div>
<div class="container">
    <?php
        // get database connection
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/employees/employee.php';
        $database = new Database();
        $db = $database->getConnection();
        $employee = new Employee($db);
        $employee->employeeList();
    ?>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>
