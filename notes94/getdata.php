<?php
$host="localhost";
$username="id19616982_nss";
$password="Notessharing@123";
$dbname="id19616982_notessharing";

$conn=mysql_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno())
	echo "Connection not established".mysqli_connect_error();
else
	echo "connection established";

?>