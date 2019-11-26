<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/manufacturer/manufacturer.php';
$database = new Database();
$db = $database->getConnection();
$connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
$manufacturer = new Manufacturer($db);
$manufacturer->addManufacturer();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<div class="col-md-4 offset-md-4">
    <h1>Add Manufacturer</h1>
<form enctype="multipart/form-data" method="post" action="" class="form-group">
<div class="form-group">
    <label for="name"><b>Name</b></label>
    <input name="name" placeholder="Enter name" value="" type="text" class="form-control">
    <label for="image"><b>Image:</b></label>
    <input type="file" name="image">
</div>
<button style="width:-webkit-fill-available;" type="submit" name="submit" value="submit" class='btn btn-primary'>Add</button>
  <button style="width:-webkit-fill-available;" type="button" onClick="document.location.href='/sample_project/dashboard/manufacturer/manufacturerList.php';" class='btn btn-danger'>Cancel</button>
</form>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>