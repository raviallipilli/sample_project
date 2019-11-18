
<!DOCTYPE html>
<html>
<title>Login Page</title>
<link rel="stylesheet" href="/sample_project/css/view.css">

<body>
<?php
        // get database connection
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
        include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/login/login.php';
        $database = new Database();
        $db = $database->getConnection();
        $login = new Login($db);
        $login->login();
?>
<form autocomplete="false" method="post" action="" class="form-group">
  
<div class="imgcontainer">
    <img src="/sample_project/images/img_avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input autocomplete="false" name="username" placeholder="Enter Username" value="" type="text" class="noAutoComplete">
    <label for="password"><b>Password</b></label>
    <input autocomplete="false" type="password" name="password" placeholder="Enter Password" value="" class="form-control">

    <button type="submit" name="submit" value="submit">Login</button>
  
  </div>
  <div class="container">
  <input type="checkbox" name="remember" id="remember"/>
	<label for="remember-me">Remember me</label>
  </div>
 
  <div class="container">
    <button type="button" class="cancelbtn" onClick="document.location.href='/sample_project/login/login/';">Cancel</button>
    <span class="psw"><a href="/sample_project/login/forgot_password/index.php">Forgot password</a></span>
  </div>
</form>
</body>

</html>
