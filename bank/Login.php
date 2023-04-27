<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <style>
        @media only screen and (max-width: 768px) {
            [class*="col-"] {
                width: 100%;
                display: block;
            }

            body {}
    </style>


</head>

<body>
    <div class="container-float p-3  " style="text-align: right; background-color:lightblue ; ">
        <a href="index.php">Register</a> &nbsp; &nbsp;
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-sm-6 rounded" style="margin:auto; background-color:blue; padding:10px;">

                <form action="Dashboard.php" method="post">
                    <table style=" background-color:blue; margin:auto; padding:10px; color:yellow">
                        <th colspan="2" style="text-align:center">LOGIN</th>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="email" placeholder="Enter Email" required></td>

                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" placeholder="Enter password" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center">
                                <button type="submit" name="login" id="idSubmit"> Login </button>
                            </td>
                        </tr>
                </form>

                <?php
                if (isset($_POST['login'])) {
                    $_SESSION['email'] = $_POST['email'];

                }
                // echo $_SESSION['email'];
                
                ?>


            </div>
        </div>
    </div>
</body>

</html>