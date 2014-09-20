<?php
ob_start();
session_start();
include("autoload.php");
$db     =   new MySql();
$db->connect();
$id=$_GET['id'];
$dc=new News();
$k=$dc->deletenews($id);
if($k){
	header("Location:news-listing.php");
}
?>