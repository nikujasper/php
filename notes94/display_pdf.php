<?php
$name=$_GET['name'];
$filename = "pdf/".$name;
  
// Header content type
header("Content-type: application/pdf");
  
header("Content-Length: " . filesize($filename));
  
// Send the file to the browser.
readfile($filename);
?> 