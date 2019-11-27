<?php
    // get database connection
    include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/login/login.php';
    $database = new Database();
    $db = $database->getConnection();
    $login = new Login($db);
    $login->register();
?>
<title>Register Page</title>
<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>

<body style="background-color:lightyellow">
<div class='col-md-4 offset-md-4'>
<form autocomplete="false" method="post" action="" class="form-group">  
  <div class="text-center">
    <img src="/sample_project/images/img_avatar.png" alt="" class="img-fluid">
  </div>

  <div class="form-group">
    <label for="username"><b>Username</b></label>
    <input autocomplete="false" name="username" placeholder="Enter Username" value="" type="text" class="form-control">
    <label for="email"><b>Email</b></label>
    <input autocomplete="false" name="email" placeholder="Enter Email" value="" type="text" class="form-control">
    <label for="password_1"><b>Password</b></label>
    <input autocomplete="false" type="password" name="password_1" placeholder="Enter Password" value="" class="form-control">
    <label for="password_2"><b>Confirm Password</b></label>
    <input autocomplete="false" type="password" name="password_2" placeholder="Confirm Password" value="" class="form-control">
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Register</button>
    <p>
  		Already a member? <a class="btn btn-link" href="/sample_project/login/login/index.php">Sign in</a>
  	</p>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
</body>