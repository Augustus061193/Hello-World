<?php
ob_start();
session_start();
/*
 * Session.php
 * Check session for a logged user
 * Auhthor : smartcoder
*/


//Already logged user, permission granted
if(isset($_SESSION["loggedUser"])){	
}else{
	header("Location:index.php");
	exit;
}

?>