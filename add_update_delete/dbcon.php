<?php
$host="localhost";
$username="root";
$password="";
$db="infoseek";

$conn=mysqli_connect($host,$username,$password,$db);
if($conn){
// echo "connected";
}
else{
    die ("not connected");
}
?>