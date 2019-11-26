<?php
    // get database connection
    include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/login/login.php';
    $database = new Database();
    $db = $database->getConnection();
    $login = new Login($db);
    $login->login();
?>
<title>Login Page</title>
<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<link rel="stylesheet" href="/sample_project/css/view.css">
<script type='text/javascript' src="/sample_project/js/login.js"></script>

<div class='col-md-4 offset-md-4'>

<form autocomplete="false" method="post" action="" class="form-group">
<!-- display message for  login registration-->
<div id="msg"><b><?php if (isset($_GET['msg'])) echo $_GET['msg'];?></b></div>
  
  <div class="text-center">
    <img src="/sample_project/images/img_avatar.png" class="img-fluid" alt="">
  </div>
  <div class='form-group'>
  <label for="username"><b>Username</b></label>
    <input type='text' class='form-control' aria-describedby='emailHelp' placeholder='Enter Username' name="username">
    <small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone else.</small>
  </div>
  <div class='form-group'>
  <label for="password"><b>Password</b></label>
    <input type='password' class='form-control' placeholder='Enter Password' name="password">
  </div>
  <button type='submit' class='btn btn-primary' name="submit">Submit</button>

    <p>
  		Not yet a member? <a href="/sample_project/login/register/register.php">Sign up</a>
  	</p>

  <div class="form-group">
  <input type="checkbox" name="remember" id="remember"/>
	<label for="remember-me">Remember me</label>
  </div>
 
  <div class="form-group">
    <button type="button" class="btn btn-danger" onClick="document.location.href='/sample_project/login/login/';">Cancel</button>
    <span class="psw"><a class="btn btn-link" href="/sample_project/login/forgot_password/index.php">Forgot password</a></span>
  </div>

</form>
</div>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>