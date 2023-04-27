<?php
session_start();
include('dbcon.php');

if (isset($_POST['submit2'])) {

    $inputdep = $_POST['inputdep'];
    $aadhar   = $_POST['aadhar'];


    $sql    = "SELECT total FROM passbook WHERE aadhar='$aadhar'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $sum = (float) $inputdep + (float) $row['total'];

    $dt1 = date("Y-m-d");

    $sql    = "INSERT INTO history (aadhar,credit,debit,total,date)VALUES('$aadhar','$inputdep','0','$sum','$dt1')";
    $result = mysqli_query($conn, $sql);


    $sql    = "UPDATE passbook SET credit='$inputdep',total='$sum' WHERE aadhar='$aadhar'";
    $result = mysqli_query($conn, $sql);

    if ($result) {


        if (isset($_SESSION['email'])) {
        
        // header("location:Dashboard.php");
            echo "<script>location.href='Dashboard.php'</script>";
            
        }



    } else {
        $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo $msg;
    }
}

?>