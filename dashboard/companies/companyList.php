<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/header/header.php';?>
<link rel="stylesheet" href="/sample_project/css/companyList.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script type='text/javascript' src="/sample_project/js/company.js"></script>

<!-- display message for CRUD operations-->
<div id="msg"><b><?php if (isset($_GET['msg'])) echo $_GET['msg'];?></b></div>

<!-- google map look up for company-->
<div class="container">
<h1>Find the Company's Location in the Map</h1>
<div id="googleMap" style="width:100%;height:300px;"></div>
<script type="text/javascript" src="/sample_project/js/mapApi.js"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAON9TiJgkYzRJLb7Y6nshoW9RFKLQM2Dc&callback=myMap"
type="text/javascript"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=myMap"
type="text/javascript"></script> 
</div>
  
<!-- list of all the companies-->
<div class="container">
    <h1>Company's List</h1>
</div>
<div class="container">
<form class="form-group" action="companyList.php" method="post">
      <input class="form-control" type="text" placeholder="Search.." name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search'];?>">
      <button style="width:auto;" class="btn btn-secondary" name="submit" type="submit">Search</i></button>
      <button style="width:auto;" type="button" class="btn btn-success" onClick="document.location.href='/sample_project/dashboard/companies/addCompanyPage.php';">Add Company</button>
    </form>
</div>
<div class="container">
    <?php
        // get database connection
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/dashboard/companies/company.php';
        $database = new Database();
        $db = $database->getConnection();
        $company = new Company($db);
        $company->companyList();
    ?>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/helpers/footer/footer.php';?>
