<?php
$hostname  = "localhost";
$username  = "root";
$database  = "trillest";
$password  = "";

$con = mysqli_connect($hostname, $username, $password);
mysqli_select_db($con, $database) or die(mysqli_error("database not connected"));
?>

