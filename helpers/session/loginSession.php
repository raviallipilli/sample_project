<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/login/login.php';?>
<?php  
// session_start();
if($_SESSION['logged'] == true) {
    if(isset($_SESSION['logout']) == 'logout'){
        session_destroy();
    }
?>
<?php echo "<meta http-equiv='refresh' content='180;url=/sample_project/login/login/index.php' />
<div style='float:right;'>
<p>You are Logged in as -";?> 
    <?php 
    if($_SESSION['role_id'] == "1") 
    echo "Admin"; 
    else if($_SESSION['role_id'] == "2") 
    echo "Manager"; 
    else if($_SESSION['role_id'] == "3") 
    echo "Employee";
    ?> - 
    <strong><?php echo $_SESSION['username']; ?></strong></p>
</div>
<?php
}
else{ 
    echo "<meta http-equiv='refresh' content='0;url=/sample_project/login/login/index.php'/>
    ";
}?>