<?php
ob_start();
session_start();
include("autoload.php");
$db     =   new MySql();
$db->connect();
$id=$_GET['id'];
$dc=new Movie();
$k=$dc->deletemovie($id);
if($k){
	header("Location:allmovies.php");
}
?>