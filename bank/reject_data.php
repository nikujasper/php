<?php
include('dbcon.php');
$aadhar = $_GET['aadhar'];

$query  = "DELETE from user_reg WHERE aadhar=$aadhar";
$result = mysqli_query($conn, $query);

if ($result) { 
   echo "<script>alert('Data was deleted successfully!!');</script>";
    
    // header("Location: Dashboard.php");
    echo "<script>location.href='Dashboard.php'</script>";
    
} else {
    $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    echo $msg;
}


?>