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
$k=$dc->publishms($theatre);
}else if($shw=='mat_status'){
$k=$dc->publishmat($theatre);
}else if($shw=='evg_status'){
$k=$dc->publishevg($theatre);
}else if($shw=='sec_status'){
$k=$dc->publishsec($theatre);
}else if($shw=='extrashow1_status'){
$k=$dc->publishshow1($theatre);
}else if($shw=='extrashow2_status'){
$k=$dc->publishshow2($theatre);
}
if($k){
	header('Location:edittheatre.php?id='.$theatre);
}
?>