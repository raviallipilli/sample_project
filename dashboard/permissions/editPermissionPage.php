<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/permissions/permission.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'root', '','my_db');
$query = "SELECT * FROM users u 
INNER JOIN roles r ON u.role_id=r.id WHERE u.id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
$role=$row['name'];
$role=explode(",",$role);
$permission = new Permission($db);
$permission->updatePermission();
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>

<div class="col-md-4 offset-md-4">
    <h1>Edit Permissions</h1>
<form autocomplete="false" method="post" action="" class="form-group">
<div class="form-group">
    <label for="username"><b>Username</b></label>
    <input type="text" name="username" value="<?php echo $row['username']; ?>" disabled class="form-control">
    <label for="email"><b>email</b></label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>" disabled class="form-control">
    <label for="role"><b>Role:</b></label><br>
    <input type="radio"  name="role[]"  value="Admin"  size="17" <?php echo (in_array("Admin",$role)) ? 'checked="checked"' : '';?>>Admin - <?php echo "<strong style='color:red;'>Has authority of users and roles and permissions.</strong>"; ?><br>
    <input type="radio"  name="role[]"  value="Manager"  size="17" <?php echo (in_array("Manager",$role)) ? 'checked="checked"' : '';?>>Manager - <?php echo "<strong style='color:red;'>Has full authority of users, products and tools.</strong>"; ?><br>
    <input type="radio"  name="role[]"  value="Employee"  size="17" <?php echo (in_array("Employee",$role)) ? 'checked="checked"' : '';?>>Employee - <?php echo "<strong style='color:red;'>Has full authority over all products and tools.</strong>"; ?><br>
    </div>
  <button style="width:-webkit-fill-available;" type="submit" name="submit" value="submit" class='btn btn-primary'>Update</button>
  <button style="width:-webkit-fill-available;" type="button" onClick="document.location.href='/sample_project/dashboard/permissions/permissionList.php';" class='btn btn-danger'>Cancel</button>
</form>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>