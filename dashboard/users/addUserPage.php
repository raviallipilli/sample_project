<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/users/user.php';
$database = new Database();
$db = $database->getConnection();
$connection = mysqli_connect('localhost', 'root', '','my_db');
$user = new User($db);
$user->addUser();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<link rel="stylesheet" href="/sample_project/css/user.css">

<div class="container">
    <h1>Admin User</h1>
</div>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="container">
    <label for="firstname"><b>First Name</b></label>
    <input autocomplete="false" name="firstname" placeholder="Enter First Name" value="" type="text" class="noAutoComplete">
    <label for="lastname"><b>Last Name</b></label>
    <input autocomplete="false" type="text" name="lastname" placeholder="Enter Last Name" value="" class="form-control">
    <label for="gender"><b>Gender:&nbsp;&nbsp;
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female</b></label>
    <br>
    <label for="dob"><b>Date of Birth:&nbsp;&nbsp;
    <input autocomplete="false" type="date" name="dob" value="" class="form-control">
    </b></label><br>
    <label for="phonenumber"><b>Phone Number</b></label>
    <input autocomplete="false" type="text" name="phonenumber" placeholder="Enter Phone Number" value="" class="form-control">
    <label for="email"><b>Email</b></label>
    <input autocomplete="false" type="text" name="email" placeholder="Enter Email" value="" class="form-control">
    <label for="address1"><b>Address1</b></label>
    <input autocomplete="false" name="address1" placeholder="Enter address1" value="" type="text" class="noAutoComplete">
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
    <!-- <label for="vehicle"><b>Vehicles</b></label><br>
    <input type="checkbox" name="vehicle" value="van">Van<br>
    <input type="checkbox" name="vehicle" value="bus">Bus<br>
    <input type="checkbox" name="vehicle" value="2wv">Two Wheelers<br><br> -->
  </div>
<div class="container">
  <button type="submit" name="submit" value="submit">Save</button>
  <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/dashboard/users/userList.php';">Cancel</button>
</div>
</form>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>