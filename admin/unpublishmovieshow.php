<?php
ob_start();
session_start();
include("autoload.php");
$db     =   new MySql();
$db->connect();
$dc=new Theatre();
 $theatre=$_GET['theatreid'];
 $shw=$_GET['show'];
if($shw=='ms_status'){
$k=$dc->unpublishms($theatre);
}else if($shw=='mat_status'){
$k=$dc->unpublishmat($theatre);
}else if($shw=='evg_status'){
$k=$dc->unpublishevg($theatre);
}else if($shw=='sec_status'){
$k=$dc->unpublishsec($theatre);
}else if($shw=='extrashow1_status'){
$k=$dc->unpublishshow1($theatre);
}else if($shw=='extrashow2_status'){
$k=$dc->unpublishshow2($theatre);
}
if($k){
	header('Location:edittheatre.php?id='.$theatre);
}
?>