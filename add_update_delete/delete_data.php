<?php
include "dbcon.php";

$aadhar = $_GET['aadhar'];
$sql    = "DELETE FROM table1 WHERE aadhar=$aadhar";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script> alert('data deleted'); </script>  ";
    header("Location:display.php");

}


?>