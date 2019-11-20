<?php
    // get database connection
    include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/login/login.php';
    $database = new Database();
    $db = $database->getConnection();
    $login = new Login($db);
    $login->register();
?>
<title>Login Page</title>
<link rel="stylesheet" href="/sample_project/css/view.css">
<form autocomplete="false" method="post" action="" class="form-group">
  
  <div class="imgcontainer">
    <img src="/sample_project/images/img_avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input autocomplete="false" name="username" placeholder="Enter Username" value="" type="text" class="noAutoComplete">
    <label for="email"><b>Email</b></label>
    <input autocomplete="false" name="email" placeholder="Enter Email" value="" type="text" class="noAutoComplete">
    <label for="password_1"><b>Password</b></label>
    <input autocomplete="false" type="password" name="password_1" placeholder="Enter Password" value="" class="form-control">
    <label for="password_2"><b>Confirm Password</b></label>
    <input autocomplete="false" type="password" name="password_2" placeholder="Confirm Password" value="" class="form-control">
    <button type="submit" name="submit" value="submit">Register</button>
    <p>
  		Already a member? <a href="/sample_project/login/login/index.php">Sign in</a>
  	</p>
  </div>
</form>

