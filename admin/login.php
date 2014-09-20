<?php
ob_start();
session_start();
include("autoload.php");
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
if(isset($_POST["submitLogin"])){

	$txtUsername	=	trim($_POST["txtUsername"])	;		//username
	$txtPassword	=	trim($_POST["txtPassword"]);		//password
	$chkRemember	=	trim($_POST["chkRemember"]);		//store login
	
	if(empty($txtUsername) || empty($txtPassword)){
		$error	=	1;
	}else{
			if($chkRemember==1){
				/*
				 * Store login info on cookie
				*/
				$key		=	rand(1,9999).rand(111,9999);
				$crypt	= new Crypt; 
				$crypt->crypt_key($key); 										// Get encryption key
				$username = $crypt->encrypt($txtUsername);	// encrypt username
				$password = $crypt->encrypt($txtPassword);	// encrypt Password	
				setcookie("saveLogin","1");
				setcookie("loginKey",$key);
				setcookie("username",$username);
				setcookie("password",$password);			
			}else{
				setcookie("saveLogin","0");
				setcookie("loginKey","");
				setcookie("username","");
				setcookie("password","");
			}
			
			/*
			 * Login Verification 
			 * Use Auth Library for login check
			*/
			$db	=	new MySql();
			$db->connect();
			$auth	=	new Auth();
			if($auth->login(array("username"=>$txtUsername,"password"=>$txtPassword))){
				$user	=	$auth->getLoggedInfo();					
				$_SESSION["loggedUser"]	=	$user[0]["auth_id"];
				$_SESSION["loggedName"]	=	$user[0]["name"];
				header("Location:home.php?rand=".md5(rand(0,5000)));
				exit;
			}else{
				$error=2;
			}				
	}
	header("Location:index.php?error=$error");
	exit;
	
}
if(isset($_POST['cancel'])){
$error="3";
header("Location:index.php?error=$error");
}




?>