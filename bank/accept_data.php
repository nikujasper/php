<?php

include('dbcon.php');
$aadhar = $_GET['aadhar'];
$query  = "INSERT INTO user_login
        SELECT * FROM user_reg WHERE aadhar=$aadhar";
$result = mysqli_query($conn, $query);

$query  = "DELETE from user_reg WHERE aadhar=$aadhar";
$result = mysqli_query($conn, $query);

$dt1     = date("Y-m-d");
$sqlh    = "INSERT INTO history (aadhar,credit,debit,total,date)VALUES('$aadhar','0','0','0','$dt1')";
$result2 = mysqli_query($conn, $sqlh);
$sqlp    = "INSERT INTO passbook (aadhar,credit,debit,total)VALUES('$aadhar','0','0','0')";
$result2 = mysqli_query($conn, $sqlp);

if ($result) { 
   echo "<script>alert('Account activated successfully!!');</script>";

    echo "<script>location.href='Dashboard.php'</script>";
    
    // header("Location: Dashboard.php");
    // exit;
} else {
    $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    echo $msg;
}

?>