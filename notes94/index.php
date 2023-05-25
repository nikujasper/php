<?php
SESSION_START();
if (isset($_SESSION['email'])) {
  ?>
  <script type="text/javascript">
    alert("You can't signup again"); <?php
    if (($_SESSION['type']) == 'student') { ?>
      location.href = 'studentportal.php';
    <?php } else { ?>
      location.href = 'teacherportal.php';
    <?php }
    ?>
  </script>
  <?php
} else {
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <?php require_once("navbar.php"); ?>
  </head>

  <body>
    <div class="container w-50 p-3">
      <center>
        <h1><u>Signup</u></h1>
      </center>
      <form action="indexback.php" method="post">
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputName">Full Name</label>
          <input type="text" class="form-control" id="inputName" placeholder="Enter your full name" name="name" required>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Apartment, studio, or floor"
            name="address" required>
        </div>

        <div class="form-group">
          <label for="inputNumber">Contact No.</label>
          <input type="text" class="form-control" id="inputNumber" placeholder="+91" name="mob" required>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="city" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control" name="state">
              <option selected value="empty">-select-</option>
              <option value="UP">UP</option>
              <option value="bihar">Bihar</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip" required>
          </div>
        </div>


        Signup as:
        <input type="radio" name="login_type" value="student">
        <label for="html">Student</label>
        <input type="radio" name="login_type" value="teacher">
        <label for="css">Teacher</label><br>
        <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
      </form>
    </div>
    <?php require_once("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"></script>

  </body>

  </html>
<?php } ?>