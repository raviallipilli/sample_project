<link rel="stylesheet" href="/sample_project/css/viewUser.css">
<?php
// get database connection
include_once 'C:\xampp\htdocs\sample_project\config\database.php';
include_once '/xampp/htdocs/sample_project/dashboard/users/user.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'root', '','my_db');
$query = "SELECT * FROM user_profiles WHERE id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
?>
<?php include_once 'C:\xampp\htdocs\sample_project\helpers\header\header.php';?>
<div class="container">
    <h1><?php echo $row['firstname']." ".$row['lastname']." - ".$row['id']; ?></h1>
</div>
<div class="container">
    <?php if ($result->num_rows > 0) { ?>
        <table id="companies">
                <tr>
                    <th>Id:</th>
                    <td><?php echo $row['id'];?></td>
                </tr>
                <tr>
                    <th>First Name:</th>
                    <td><?php echo $row['firstname'];?></td>
                </tr>
                <tr>
                    <th>Last Name:</th>
                    <td><?php echo $row['lastname'];?></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><?php echo $row['gender'];?></td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td><?php echo $row['dob'];?></td>
                </tr>
                <tr>
                    <th>Phone Number:</th>
                    <td><?php echo $row['phonenumber'];?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $row['email'];?></td>
                </tr>
                <tr>
                    <th>Address1:</th>
                    <td><?php echo $row['address1'];?></td>
                </tr>
                <tr>
                    <th>Address2:</th>
                    <td><?php echo $row['address2'];?></td>
                </tr>
                <tr>
                    <th>Address3:</th>
                    <td><?php echo $row['address3'];?></td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td><?php echo $row['city'];?></td>
                </tr>
                <tr>
                    <th>Postcode:</th>
                    <td><?php echo $row['postcode'];?></td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td><?php echo $row['country'];?></td>
                </tr>
                <tr>
                    <th>Date Created:</th>
                    <td><?php echo $row['date_created'];?></td>
                </tr>
                <tr>
                    <th>Date Updated:</th>
                    <td><?php echo $row['date_updated'];?></td>
                </tr>
        </table>
        <?php } else { ?>
        <?php echo "0 results"; ?>
        <?php } ?> 
</div>
<?php include_once 'C:\xampp\htdocs\sample_project\helpers\footer\footer.php';?>