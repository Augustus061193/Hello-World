<?php
ob_start();
include("autoload.php");
$db   = new MySql();
$db->connect();
 $theatreid=$_GET['theatreid'];
 $time=$_GET['time'];
 $dat=$_GET['date'];

$bn= new Check();
$xc=$bn->checkms($theatreid,$dat);
if($xc){
	echo '<span style="color:red">Available</span>';
}else{
	echo '<span style="color:red">Not Available</span>';
}

?>