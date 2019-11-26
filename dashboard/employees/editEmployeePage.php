<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/employees/employee.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
$query = "SELECT * FROM employees WHERE id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
$employee = new Employee($db);
$employee->updateEmployee();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<div class="col-md-4 offset-md-4">
    <h1>Edit Employee</h1>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="form-group">
    <label for="firstname"><b>First Name</b></label>
    <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" class="form-control">
    <label for="lastname"><b>Last Name</b></label>
    <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" class="form-control">
    <label for="gender"><b>Gender:&nbsp;&nbsp;
    <input type="radio" name="gender" value="male"<?php if($row['gender']=='Male') echo "checked"; ?>> Male
    <input type="radio" name="gender" value="female"<?php if($row['gender']=='Female') echo "checked"; ?>> Female</b></label>
    <br>
    <label for="dob"><b>Date of Birth:&nbsp;&nbsp;
    <input type="date" name="dob" value="<?php echo $row['dob']; ?>">
    </b></label><br>
    <label for="phonenumber"><b>Phone Number</b></label>
    <input type="text" name="phonenumber" value="<?php echo $row['phonenumber']; ?>" class="form-control">
    <label for="email"><b>Email</b></label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control">
    <label for="address1"><b>Address1</b></label>
    <input type="text" name="address1" value="<?php echo $row['address1']; ?>" class="form-control">
    <label for="address2"><b>Address2</b></label>
    <input type="text" name="address2" value="<?php echo $row['address2']; ?>" class="form-control">
    <label for="address3"><b>Address3</b></label>
    <input type="text" name="address3" value="<?php echo $row['address3']; ?>" class="form-control">
    <label for="city"><b>City</b></label>
    <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control">
    <label for="postcode"><b>Postcode</b></label>
    <input type="text" name="postcode" value="<?php echo $row['postcode']; ?>" class="form-control">
    <label for="country"><b>Country</b></label>
    <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control">
    </div>
  <button style="width:-webkit-fill-available;" type="submit" name="submit" value="submit" class='btn btn-primary'>Update</button>
  <button style="width:-webkit-fill-available;" type="button" onClick="document.location.href='/sample_project/dashboard/employees/employeeList.php';" class='btn btn-danger'>Cancel</button>
</form>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>