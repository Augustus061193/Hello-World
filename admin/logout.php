<?php
ob_start();
session_start();
include("autoload.php");
session_destroy();
header("Location:index.php");
exit;

?>