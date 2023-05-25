<?php
include 'dbcon.php';
$id= $_GET['id'];
$fileName=$_GET['name'];

$file_pointer = "pdf/".$fileName;
if (!unlink($file_pointer)) {
    echo ("$file_pointer cannot be deleted due to an error");
}
else {
    echo ("$file_pointer has been deleted");
}

$query= "delete from pdf_data where id= '$id'";
if (mysqli_query($con, $query)) {
   header('Location:teacherportal.php');
} else {
  echo "Error deleting record: " . mysqli_error($con);
}
?>