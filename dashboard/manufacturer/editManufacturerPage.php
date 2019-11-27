<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/manufacturer/manufacturer.php';
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
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<div class="col-md-4 offset-md-4">
    <h1>Edit Manufacturer</h1>
<form enctype="multipart/form-data" method="post" action="" class="form-group">
 <div class="form-group">
    <label for="name"><b>Name</b></label>
    <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
    <label for="image"><b>Current Image</b></label>
    <input class="form-control" type="text" name="image" value="<?php echo $row['image']; ?>">
    <label for="image"><b>New Image:</b></label>
    <input type="file" name="image">
  </div>
  <button style="width:-webkit-fill-available;" type="submit" name="submit" value="submit" class='btn btn-primary'>Update</button>
  <button style="width:-webkit-fill-available;" type="button" onClick="document.location.href='/sample_project/dashboard/manufacturer/manufacturerList.php';" class='btn btn-danger'>Cancel</button>
</form>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>