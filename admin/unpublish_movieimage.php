<?php
ob_start();
session_start();
include("autoload.php");
$db     =   new MySql();
$db->connect();
$id=$_GET['id'];
 $theatre=$_GET['theatreid'];

$dc=new Movieimage();
$k=$dc->unpublishimage($id);
if($k){
	header('Location:editmovie.php?id='.$theatre);
}
?>