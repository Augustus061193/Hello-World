<?php
ob_start();
include("autoload.php");
$db   = new MySql();
$db->connect();
$obj=new Movie();
$s=$obj->updatecron();
?>