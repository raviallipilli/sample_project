<?php include_once '/xampp/htdocs/sample_project/helpers/header/header.php';?>
<link rel="stylesheet" href="/sample_project/css/company.css">
<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/companies/company.php';
$database = new Database();
$db = $database->getConnection();
$connection = mysqli_connect('localhost', 'root', '','my_db');
$company = new Company($db);
$company->addCompany();
?>
<div class="container">
    <h1>Admin Company</h1>
</div>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="container">
    <label for="name"><b>Name</b></label>
    <input autocomplete="false" name="name" placeholder="Enter name" value="" type="text" class="noAutoComplete">
    <label for="address1"><b>Address1</b></label>
    <input autocomplete="false" type="text" name="address1" placeholder="Enter Address1" value="" class="form-control">
    <label for="address2"><b>Address2</b></label>
    <input autocomplete="false" name="address2" placeholder="Enter address2" value="" type="text" class="noAutoComplete">
    <label for="address3"><b>Address3</b></label>
    <input autocomplete="false" type="text" name="address3" placeholder="Enter Address3" value="" class="form-control">
    <label for="city"><b>City</b></label>
    <input autocomplete="false" name="city" placeholder="Enter city" value="" type="text" class="noAutoComplete">
    <label for="postcode"><b>Postcode</b></label>
    <input autocomplete="false" name="postcode" placeholder="Enter postcode" value="" type="text" class="noAutoComplete">
    <label for="country"><b>Country</b></label>
    <input autocomplete="false" type="text" name="country" placeholder="Enter Country" value="" class="form-control">
  </div>
<div class="container">
  <button type="submit" name="submit" value="submit">Save</button>
  <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/dashboard/companies/companyList.php';">Cancel</button>
</div>
</form>
<?php include_once '/xampp/htdocs/sample_project/helpers/footer/footer.php';?>