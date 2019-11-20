<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/users/user.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'root', '','my_db');
$query = "SELECT * FROM user_profiles WHERE id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
$user = new User($db);
$user->updateUser();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>
<link rel="stylesheet" href="/sample_project/css/user.css">

<div class="container">
    <h1>Admin Company</h1>
</div>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="container">
    <label for="firstname"><b>First Name</b></label>
    <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
    <label for="lastname"><b>Last Name</b></label>
    <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
    <label for="gender"><b>Gender:&nbsp;&nbsp;
    <input type="radio" name="gender" value="male"<?php if($row['gender']=='Male') echo "checked"; ?>> Male
    <input type="radio" name="gender" value="female"<?php if($row['gender']=='Female') echo "checked"; ?>> Female</b></label>
    <br>
    <label for="dob"><b>Date of Birth:&nbsp;&nbsp;
    <input type="date" name="dob" value="<?php echo $row['dob']; ?>">
    </b></label><br>
    <label for="phonenumber"><b>Phone Number</b></label>
    <input type="text" name="phonenumber" value="<?php echo $row['phonenumber']; ?>">
    <label for="email"><b>Email</b></label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>">
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
  <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/dashboard/users/userList.php';">Cancel</button>
  </div>
</form>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>