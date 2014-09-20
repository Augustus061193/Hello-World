<?php
ob_start();
session_start();
include("autoload.php");
$db     =   new MySql();
$db->connect();
$id=$_GET['id'];
 $theatre=$_GET['theatreid'];

$dc=new Theatreimage();
$k=$dc->unpublishimage($id);
if($k){
	header('Location:edittheatre.php?id='.$theatre);
}
?>