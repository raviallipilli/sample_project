<?php  
session_start();
if($_SESSION['logged'] == true) 
?>
<div style="float:right;">
<p>You are Logged in as - <strong><?php echo $_SESSION['username']; ?></strong></p>
</div>