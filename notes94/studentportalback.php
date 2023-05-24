<?php
if(isset($_POST['submit']))
{
	$sub=$_POST['department'];
    
    if(strlen($sub)==0){
        header('Location:studentportal.php');
    }
    
    echo $sub."  ";
    
}

?>