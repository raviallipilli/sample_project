<link rel="stylesheet" href="/sample_project/css/company.css">
<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/manufacturer/manufacturer.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'root', '','my_db');
$query = "SELECT * FROM manufacturer WHERE id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
$manufacturer = new Manufacturer($db);
$manufacturer->updateManufacturer();
?>
<?php include_once 'C:\xampp\htdocs\sample_project\helpers\header\header.php';?>
<div class="container">
    <h1>Admin Manufacturer</h1>
</div>
<form enctype="multipart/form-data" method="post" action="" class="form-group">
 <div class="container">
    <label for="name"><b>Name</b></label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <label for="image"><b>Current Image</b></label>
    <input type="text" name="image" value="<?php echo $row['image']; ?>">
    <label for="image"><b>New Image:</b></label>
    <input type="file" name="image">
  </div>
  <div class="container">
  <button type="submit" name="submit" value="submit" onclick="myFunction()">Save</button>
    <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/dashboard/manufacturer/manufacturerList.php';">Cancel</button>
  </div>
</form>
<?php include_once 'C:\xampp\htdocs\sample_project\helpers\footer\footer.php';?>