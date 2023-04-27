<?php
$host     = "localhost";
$username = "root";
$password = "";
$databse  = "bank";

$conn = mysqli_connect($host, $username, $password, $databse);

if (!$conn) {
    die("Connection failed!" . mysqli_connect_error());
} 


?>