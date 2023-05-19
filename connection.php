<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "moviesname";

$conn =mysqli_connect($servername,$username,$password,$dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  ?>
?>