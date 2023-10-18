<?php

$server = "localhost";
$username = "lamp_bank_php";
$password = "123456";
$database = "lamp_bank";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { 
  $error = mysqli_connect_error();
  die("Connection failed: $error");       
}

?>