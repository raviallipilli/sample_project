<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/session/loginSession.php';?>

    <?php
    // admin
  if($_SESSION["role_id"] == "1") { 
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
      <title>Admin Dashboard Page</title>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
      <link rel='stylesheet' type='text/css' href='/sample_project/css/header.css'>
    </head>
    <body>
    <br>
    <br>
    <form>";
    echo "<nav class='navbar navbar-expand-md'>
    <button class='navbar-toggler navbar-dark' type='button' data-toggle='collapse' data-target='.navbar-collapse'>
      <span class='navbar-toggler-icon'></span>
    </button><br>
    <div class='collapse navbar-collapse' id='main-navigation'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/companies/companyList.php'>Companies</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/manufacturer/manufacturerList.php'>Manufacturer</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/employees/employeeList.php'>Employees</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/tools/toolsList.php'>Tools</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/permissions/permissionList.php'>Permissions</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/support/support.php'>Support</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/login/login/index.php?logout=logout'>LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>";
            //  <a href="#about">About</a>
            // <a href="#blog">Blog</a> 
            // <a href="#base">Base</a>
            // <a href="#custom">Custom</a>
            // <a href="#more">More</a>
            // <a href="#logo">Logo</a>
            // <a href="#friends">Friends</a>
            // <a href="#partners">Partners</a>
            // <a href="#people">People</a> 
            
}?>
 <?php
 // manager view
   if($_SESSION["role_id"] == "2") { 

    echo "<nav class='navbar navbar-expand-md'>
    <button class='navbar-toggler navbar-dark' type='button' data-toggle='collapse' data-target='.navbar-collapse'>
      <span class='navbar-toggler-icon'></span>
    </button><br>
    <div class='collapse navbar-collapse' id='main-navigation'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/companies/companyList.php'>Companies</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/manufacturer/manufacturerList.php'>Manufacturer</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/employees/employeeList.php'>Employees</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/tools/toolsList.php'>Tools</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/support/support.php'>Support</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/login/login/index.php?logout=logout'>LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>";
}?>
 <?php
 // employee view
   if($_SESSION["role_id"] == "3") { 

    echo "<nav class='navbar navbar-expand-md'>
    <button class='navbar-toggler navbar-dark' type='button' data-toggle='collapse' data-target='.navbar-collapse'>
      <span class='navbar-toggler-icon'></span>
    </button><br>
    <div class='collapse navbar-collapse' id='main-navigation'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/manufacturer/manufacturerList.php'>Manufacturer</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/employees/employeeList.php'>Employees</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/tools/toolsList.php'>Tools</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/dashboard/support/support.php'>Support</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='/sample_project/login/login/index.php?logout=logout'>LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>";
}?>

<?php echo "
</form>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>

</body>";?>

