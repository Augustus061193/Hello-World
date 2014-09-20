<?php
ob_start();
session_start();
include("autoload.php");
$db     =   new MySql();
$db->connect();
$id=$_GET['id'];
$dc=new Theatre();
$k=$dc->deletetheatre($id);
if($k){
	header("Location:alltheatre.php");
}
?>