<?php
session_start();
include('dbcon.php');

if (isset($_POST['submit'])) {


    $name     = $_POST['name'];
    $aadhar   = $_POST['aadhar'];
    $mobile   = $_POST['mobile'];
    $email    = $_POST['email'];
    $address  = $_POST['address'];
    $password = $_POST['password'];

    $sql = "UPDATE user_login SET name='$name',mobile='$mobile',address='$address',password='$password' WHERE aadhar='$aadhar'";

    $result = mysqli_query($conn, $sql);


    if ($result) {
        if (isset($_SESSION['email'])) {

            echo "<script>location.href='Dashboard.php'</script>";
        }

    } else {
        $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo $msg;
    }
}

?>