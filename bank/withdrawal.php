<?php
session_start();
include('dbcon.php');

if (isset($_POST['submit1'])) {

    $inputwid = $_POST['inputwid'];
    $aadhar   = $_POST['aadhar'];



    $sql    = "SELECT total FROM passbook WHERE aadhar='$aadhar'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result);

    if ((float) $row['total'] > (float) $inputwid) {


        $sub = (float) $row['total'] - (float) $inputwid;

        $dt1 = date("Y-m-d");

        $sql    = "INSERT INTO history (aadhar,credit,debit,total,date)VALUES('$aadhar','0','$inputwid','$sub','$dt1')";
        $result = mysqli_query($conn, $sql);


        $sql    = "UPDATE passbook SET debit='$inputwid',total='$sub' WHERE aadhar='$aadhar'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (isset($_SESSION['email'])) {

                echo "<script>location.href='Dashboard.php'</script>";
            }

        } else {
            $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo $msg;
        }
    } else {
        echo "<script> alert('Enter a valid amount...!!!');</script>";
        echo "<script>location.href='Dashboard.php';</script>";
    }
}
?>