<?php
include "dbcon.php";
if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $aadhar   = $_POST['aadhar'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql    = "UPDATE table1 SET name='$name',password='$password',email='$email' WHERE aadhar='$aadhar'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert ('Data Deleted');</script>";
        header("Location:display.php");
    }
}
?>