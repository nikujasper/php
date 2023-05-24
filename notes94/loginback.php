<?php
$con = mysqli_connect("localhost", "root", "");
SESSION_START();
if(!$con)
{
    echo "not connected to server";
}
if(!mysqli_select_db($con,"notes94"))
{
    echo "not db";
}
if(isset($_POST['submit']))
{

    $code=md5(uniqid());
    
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $tab=$_POST['login_type'];
    
    if ($tab=='student') {
     
    $query= "select * from std_signup where email= '$email'";
    $data= mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($data);
    if($rowcount==1)
    {
        $query1= "select * from std_signup where password= '$password'";
        $data1= mysqli_query($con,$query);
        $rowcount1=mysqli_num_rows($data);
        if($rowcount1==1){
            $_SESSION['email']=$email;
            $_SESSION['type']=$tab;
            header("Location: studentportal.php");
        }
        else{ ?>
            <script type="text/javascript" language="javascript">
            alert("Please enter valid Password.");  
            location.href='login.php';
            </script>
       <?php }
    }
        
    else{ ?>
            <script type="text/javascript" language="javascript">
            alert("Please signup");  
            location.href='index.php';
            </script>
        <?php

    }
  }

else{


    $query= "select * from tech_signup where email= '$email'";
    $data= mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($data);
    if($rowcount==1)
    {
        $query1= "select * from tech_signup where password= '$password'";
        $data1= mysqli_query($con,$query);
        $rowcount1=mysqli_num_rows($data);
        if($rowcount1==1){
            $_SESSION['email']=$email;
            $_SESSION['type']=$tab;
            header("Location: teacherportal.php");
        }
        else{ ?>
            <script type="text/javascript" language="javascript">
            alert("Please enter valid Password.");  
            location.href='login.php';
            </script>
        <?php }
    }
        
    else{ ?>
            <script type="text/javascript" language="javascript">
            alert("Please signup");  
            location.href='index.php';
            </script>
        <?php

    }
}

}

    
    ?>

