<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// get database connection
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/config/database.php';

// instantiate object
include_once $_SERVER['DOCUMENT_ROOT'] .'/sample_project/login\login.php';

$database = new Database();
$db = $database->getConnection();

$connection = mysqli_connect('localhost', 'id11609533_root', 'admin','id11609533_my_db');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$error = "";
$key=0;
if (!$email) {
   $error .="<p>Invalid email address please type a valid email address!</p>";
   }else{
   $sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
   $results = mysqli_query($connection,$sel_query);
   $row = mysqli_num_rows($results);
   $imageUrl="/sample_project/images/recover.email.png";
   if ($row==""){
   $error .= "
   
  
   <p style='padding-left: 519px;'>No user is registered with this email address!</p>
   
   ";
   }
  }
   if($error!=""){
   echo "<br><br><br><br><br><br>
   <div class='imgcontainer' style='text-align: center;
   margin: 24px 0 12px 0;'>
       <img src='$imageUrl' alt='Avatar' class='avatar' style='width: 15%;
       border-radius: 50%;'>
     </div>
     <div class='error'>".$error."</div>
     <br /><div class='container' style='padding-left: 443px;'><a style='padding-left: 200px;' href='javascript:history.go(-1)'>Go Back</a></div>

   ";
   }else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2+$email);
  
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($connection,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="$_SERVER[\'DOCUMENT_ROOT\']/sample_project/login/reset_password/reset_password.php?
key='.$key.'&email='.$email.'&action=reset" target="_blank">
$_SERVER[\'DOCUMENT_ROOT\']/sample_project/login/reset_password/reset_password.php
?key='.$key.'&email='.$email.'&action=reset</a></p>'; 
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   
$output.='<p>Thanks,</p>';
$output.='<p>Support Team</p>';
$body = $output; 
$subject = "Password Recovery ";

$email_to = $email;
$fromserver = "luckyravi17@gmail.com"; 
require $_SERVER['DOCUMENT_ROOT'] .'/sample_project/phpmailer/phpmailer/PHPMailer-master/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] .'/sample_project/phpmailer/phpmailer/PHPMailer-master/src/SMTP.php';
require $_SERVER['DOCUMENT_ROOT'] .'/sample_project/phpmailer/phpmailer/PHPMailer-master/src/Exception.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->Host = "smtp.gmail.com"; // Enter your host here
$mail->SMTPDebug = 1; 
$mail->Port = 465 ; //465 or 587
$mail->SMTPSecure = 'ssl';  
$mail->SMTPAuth = true; 
$mail->IsHTML(true);
$mail->Username = "luckyravi17@gmail.com"; // Enter your email here
$mail->Password = "ravi17071983"; //Enter your password here
$mail->From = "luckyravi17@gmail.com";
$mail->FromName = "Password Recovery";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
 }
   }
}else{
?>
<title>Forgot Password Page</title>
<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
  <body>
  <div class='col-md-4 offset-md-4'>
<form autocomplete="false" method="post" action="" class="form-group" enctype="application/x-www-form-urlencoded">
<br /><br />
<div class="text-center">
    <img src="/sample_project/images/reset.password.png" alt="" class="img-fluid">
  </div>
<div class="form-control">
<label for="email"><b>Enter Your Email Address:</b></label><br /><br />
<input class="form-control" type="email" name="email" placeholder="username@email.com" />
<br /><br />
<button type="submit" name="submit" value="Reset Password" class="btn btn-primary">Reset Password</button>
</div>
</form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
</body>
<?php } ?>