<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/companies/company.php';
$database = new Database();
$db = $database->getConnection();
$connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
$company = new Company($db);
$company->addCompany();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<div class="col-md-4 offset-md-4">
    <h1>Add Company</h1>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="form-group">
    <label for="name"><b>Name</b></label>
    <input autocomplete="false" name="name" placeholder="Enter name" value="" type="text" class="form-control">
    <label for="address1"><b>Address1</b></label>
    <input autocomplete="false" type="text" name="address1" placeholder="Enter Address1" value="" class="form-control">
    <label for="address2"><b>Address2</b></label>
    <input autocomplete="false" name="address2" placeholder="Enter address2" value="" type="text" class="form-control">
    <label for="address3"><b>Address3</b></label>
    <input autocomplete="false" type="text" name="address3" placeholder="Enter Address3" value="" class="form-control">
    <label for="city"><b>City</b></label>
    <input autocomplete="false" name="city" placeholder="Enter city" value="" type="text" class="form-control">
    <label for="postcode"><b>Postcode</b></label>
    <input autocomplete="false" name="postcode" placeholder="Enter postcode" value="" type="text" class="form-control">
    <label for="country"><b>Country</b></label>
    <input autocomplete="false" type="text" name="country" placeholder="Enter Country" value="" class="form-control">
  </div>
  <button style="width:-webkit-fill-available;" type="submit" name="submit" value="submit" class='btn btn-primary'>Add</button>
  <button style="width:-webkit-fill-available;" type="button" onClick="document.location.href='/sample_project/dashboard/companies/companyList.php';" class='btn btn-danger'>Cancel</button>
</form>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>