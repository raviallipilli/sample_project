<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/manufacturer/manufacturer.php';
$database = new Database();
$db = $database->getConnection();
$connection = mysqli_connect('localhost', 'root', '','my_db');
$manufacturer = new Manufacturer($db);
$manufacturer->addManufacturer();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<link rel="stylesheet" href="/sample_project/css/manufacturer.css">
<div class="container">
    <h1>Admin Manufacturer</h1>
</div>
<form enctype="multipart/form-data" method="post" action="" class="form-group">
<div class="container">
    <label for="name"><b>Name</b></label>
    <input name="name" placeholder="Enter name" value="" type="text">
    <label for="image"><b>Image:</b></label>
    <input type="file" name="image">
</div>
<div class="container">
  <button type="submit" name="submit" value="submit" onclick="myFunction()">Save</button>
    <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/dashboard/manufacturer/manufacturerList.php';">Cancel</button>
</div>
</form>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>