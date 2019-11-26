<?php
// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/companies/company.php';
$database = new Database();
$db = $database->getConnection();
$id=$_GET['id'];
$connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
$query = "SELECT * FROM companies WHERE id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ("Database connection failed");
$row = mysqli_fetch_assoc($result);
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>
<link rel="stylesheet" href="/sample_project/css/viewCompany.css">
<div class="container">
    <h1>View Company</h1>
</div>
<div class="container">
    <h1><?php echo $row['name']." - ".$row['id']; ?></h1>
</div>
<div class="container">
    <?php if ($result->num_rows > 0) { ?>
        <table class="table" id="companies">
            <thead class="thead-dark">
                <tr>
                    <th>Id:</th>
                    <td class="table-success"><?php echo $row['id'];?></td>
                </tr>
                <tr>
                    <th>Company Name:</th>
                    <td class="table-success"><?php echo $row['name'];?></td>
                </tr>
                <tr>
                    <th>Address1:</th>
                    <td class="table-success"><?php echo $row['address1'];?></td>
                </tr>
                <tr>
                    <th>Address2:</th>
                    <td class="table-success"><?php echo $row['address2'];?></td>
                </tr>
                <tr>
                    <th>Address3:</th>
                    <td class="table-success"><?php echo $row['address3'];?></td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td class="table-success"><?php echo $row['city'];?></td>
                </tr>
                <tr>
                    <th>Postcode:</th>
                    <td class="table-success"><?php echo $row['postcode'];?></td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td class="table-success"><?php echo $row['country'];?></td>
                </tr>
                <tr>
                    <th>Date Created:</th>
                    <td class="table-success"><?php echo $row['date_created'];?></td>
                </tr>
                <tr>
                    <th>Date Updated:</th>
                    <td class="table-success"><?php echo $row['date_updated'];?></td>
                </tr>
            </thead>
        </table>
        <?php } else { ?>
        <?php echo "0 results"; ?>
        <?php } ?>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>