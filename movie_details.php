<?php
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    //Ajax request
    ob_start();
    include("autoload.php");
    $db   = new MySql();
    $db->connect();
    include 'movie_details_load.php';
  }
  else {
    $movie_details_onload = "true";
    include('index-custom.php');
  }
?>