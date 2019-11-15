<link rel="stylesheet" href="/sample_project/css/company.css">
<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/companies/company.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'root', '','my_db');
$query = "SELECT * FROM companies WHERE id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
$company = new Company($db);
$company->updateCompany();
?>
<?php include_once 'C:\xampp\htdocs\sample_project\helpers\header\header.php';?>
<div class="container">
    <h1>Admin Company</h1>
</div>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="container">
    <label for="name"><b>Name</b></label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <label for="address1"><b>Address1</b></label>
    <input type="text" name="address1" value="<?php echo $row['address1']; ?>">
    <label for="address2"><b>Address2</b></label>
    <input type="text" name="address2" value="<?php echo $row['address2']; ?>">
    <label for="address3"><b>Address3</b></label>
    <input type="text" name="address3" value="<?php echo $row['address3']; ?>">
    <label for="city"><b>City</b></label>
    <input type="text" name="city" value="<?php echo $row['city']; ?>">
    <label for="postcode"><b>Postcode</b></label>
    <input type="text" name="postcode" value="<?php echo $row['postcode']; ?>">
    <label for="country"><b>Country</b></label>
    <input type="text" name="country" value="<?php echo $row['country']; ?>">
</div>
<div class="container">
  <button type="submit" name="submit" value="submit">Save</button>
  <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/dashboard/companies/companyList.php';">Cancel</button>
  </div>
</form>
<?php include_once 'C:\xampp\htdocs\sample_project\helpers\footer\footer.php';?>