<?php
include "dbcon.php";

if (isset($_POST['submit'])) {

    $aadhar   = $_POST['aadhar'];
    $name     = $_POST['name'];
    $password = $_POST['password'];
    $email    = $_POST['email'];

    $sql    = "INSERT INTO table1(aadhar,name,password,email)VALUES('$aadhar','$name','$password','$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script> alert('data inserted'); </script>";
        header("Location:display.php");
    }

}


?>