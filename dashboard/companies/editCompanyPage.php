<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/companies/company.php';
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
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<div class="col-md-4 offset-md-4">
    <h1>Edit Company</h1>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="form-group">
    <label for="name"><b>Name</b></label>
    <input autocomplete="false" name="name" placeholder="Enter name" value="<?php echo $row['name']; ?>" type="text" class="form-control">
    <label for="address1"><b>Address1</b></label>
    <input autocomplete="false" type="text" name="address1" placeholder="Enter Address1" value="<?php echo $row['address1']; ?>" class="form-control">
    <label for="address2"><b>Address2</b></label>
    <input autocomplete="false" name="address2" placeholder="Enter address2" value="<?php echo $row['address2']; ?>" type="text" class="form-control">
    <label for="address3"><b>Address3</b></label>
    <input autocomplete="false" type="text" name="address3" placeholder="Enter Address3" value="<?php echo $row['address3']; ?>" class="form-control">
    <label for="city"><b>City</b></label>
    <input autocomplete="false" name="city" placeholder="Enter city" value="<?php echo $row['city']; ?>" type="text" class="form-control">
    <label for="postcode"><b>Postcode</b></label>
    <input autocomplete="false" name="postcode" placeholder="Enter postcode" value="<?php echo $row['postcode']; ?>" type="text" class="form-control">
    <label for="country"><b>Country</b></label>
    <input autocomplete="false" type="text" name="country" placeholder="Enter Country" value="<?php echo $row['country']; ?>" class="form-control">
  </div>
  <button style="width:-webkit-fill-available;" type="submit" name="submit" value="submit" class='btn btn-primary'>Update</button>
  <button style="width:-webkit-fill-available;" type="button" onClick="document.location.href='/sample_project/dashboard/companies/companyList.php';" class='btn btn-danger'>Cancel</button>
</form>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>