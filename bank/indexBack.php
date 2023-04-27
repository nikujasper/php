<?php
include('dbcon.php');

if (isset($_POST['submit'])) {


    $name     = $_POST['name'];
    $aadhar   = $_POST['aadhar'];
    $mobile   = $_POST['mobile'];
    $email    = $_POST['email'];
    $address  = $_POST['address'];
    $password = $_POST['password'];



    $sql    = "SELECT * FROM user_reg WHERE aadhar='$aadhar' AND email='$email'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {


        echo "<script> alert('Already registered...!!!');</script>";
        echo "<script>location.href='Login.php'</script>";


    } else {

        $sql = "INSERT INTO user_reg (name, aadhar , mobile, email, address, password) VALUES ('$name','$aadhar','$mobile','$email', '$address', '$password')";
        mysqli_query($conn, $sql);

        echo "<script> alert('Registered Successfully...!!!');</script>";
        echo "<script>location.href='Login.php'</script>";
        //  header("Location:Login.php");
    }
}

?>