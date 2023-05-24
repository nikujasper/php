<?php 
SESSION_START();
if(isset($_SESSION['email'])){
  ?>
  <script type="text/javascript">
    alert("You can't login again");  
    <?php 
    if(($_SESSION['type'])=='student'){ ?>
       location.href='studentportal.php';
    <?php }
    else{ ?>
      location.href='teacherportal.php';
    <?php }
    ?>
  </script> <?php
}
else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css">
	<?php require_once("navbar.php"); ?>
</head>
<body>

<div class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="draw2.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="loginback.php" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
           
          </div>

          

          <!-- Email input -->
          <div class="form-outline mb-4">
          	<label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" name="email" />
             
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          	<label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" />
            
          </div>

          <div class="d-flex justify-content-between align-items-center">
            

          <div class="form-check mb-0">
          login as:
          <input type="radio"  name="login_type" value="student">
          <label for="html">Student</label>
          <input type="radio"  name="login_type" value="teacher">
          <label for="css">Teacher</label><br>
          </div>
           
          </div>
           <a href="forgot.php " class="text-body">Forgot password?</a>

          <div class="text-center text-lg-start mt-4 pt-2">

              <button type="submit" name="submit" class="btn btn-primary">Login</button>
               </div>
              </form>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="index.php"
                class="link-danger">Register</a></p>
         
        
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
<footer>
  <?php require_once("footer.php"); ?>
</footer>
</html>
<?php } ?>