<?php
if(isset($_POST['submit']))

{
	session_start();
	$text=$_SESSION["vercode"] ;
unset($_SESSION["vercode"]);
 $captcha        =  $_POST['txtCode'];

  if($captcha==$text)
{
$email_to = "info@aiswaryacinemascreens.com";
 	
$email_from = $_POST['user_mail'];

$email_subject = "Enquiry Form";

$name=$_POST['user_name'];



$phone=$_POST['user_cell'];

$message=$_POST['user_message'];

$msg="Name:" .$name."\r\n"."E-mail:" .$email_from."\r\n"."Message:" .$message."\r\n"."Phone:" .$phone;

$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

mail($email_to, $email_subject, $msg, $headers); 
header("Location:contact.php?msg=Success");
}
else {

	header("Location:contactus.php?msg=Values mismatch");
}
}

?>