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
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phone=$_POST['mob'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $tab=$_POST['login_type'];
    
    if ($tab=='student') {
     
    $query= "select * from std_signup where email= '$email'";
    $data= mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($data);
    if($rowcount==1)
    {
        ?>
  <script type="text/javascript" language="javascript">
    alert("Your details are with us click on OK for log in");  
    location.href='login.php';
    </script>
    <?php
    }
    else
    {
    $query= "INSERT INTO `std_signup` ( `email`, `password`, `name`, `address`, `number`, `city`, `state`, `zip`) VALUES ('$email','$password','$name','$address','$phone','$city','$state','$zip')";
    if(!mysqli_query($con,$query))
    {
        echo"not ";
    }
    else
    {
        ?>
        <script type="text/javascript" language="javascript">
        alert("Thank you for conecting us press OK to go at home page");  
        <?php
        $_SESSION['email']=$email;
        $_SESSION['type']=$tab;
        ?>
        location.href='studentportal.php';
        </script>
  <?php 
    }
}
}

else{


     
    $query= "select * from tech_signup where email= '$email'";
    $data= mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($data);
    if($rowcount==1)
    {
        ?>
  <script type="text/javascript" language="javascript">
    alert("Your details are with us click on OK for log in");  
    location.href='login.php';
    </script>
    <?php
    }
    else
    {
    $query= "INSERT INTO `tech_signup` ( `email`, `password`, `name`, `address`, `number`, `city`, `state`, `zip`) VALUES ('$email','$password','$name','$address','$phone','$city','$state','$zip')";
    if(!mysqli_query($con,$query))
    {
        echo"not ";
    }
    else
    {
        ?>
        <script type="text/javascript" language="javascript">
        alert("Thank you for conecting us press OK to go at home page");  
        <?php
        $_SESSION['email']=$email;
        $_SESSION['type']=$tab;
        ?>
        location.href='teacherportal.php';
        </script>
  <?php 
    }
}

}

}

    
    ?>

