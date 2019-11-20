<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>
<link rel="stylesheet" href="/sample_project/css/manufacturerList.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script type='text/javascript' src="/sample_project/js/manufacturer.js"></script>

<!-- displays the message for CRUD operations-->
<div id="msg"><b><?php if (isset($_GET['msg']))echo $_GET['msg'];?></b></div>
<div class="container">
    <h1>Admin Manufacturer List</h1>
</div>
<div class="container">
    <button style="float:right" type="button" class="" onClick="document.location.href='/sample_project/dashboard/manufacturer/addManufacturerPage.php';">Add Manufacturer</button>
    <form action="manufacturerList.php" method="post">
      <input type="text" placeholder="Search.." name="search" value="<?php if (isset($_POST['search']))echo $_POST['search'];?>">
      <button class="btnSearch" name="submit" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="container">
    <?php
        // get database connection
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/manufacturer/manufacturer.php';
        $database = new Database();
        $db = $database->getConnection();
        $manufacturer = new Manufacturer($db);
        $manufacturer->manufacturerList();
    ?>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>
