<?php
session_start();
// echo $_SESSION['email'];
if (isset($_SESSION["email"])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
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
            }

            .collapsing {
                transition: none !important;
            }

            .td1,
            .th1,
            .table2 {
                border: 3px solid yellow;
                border-collapse: collapse;
                background-color: blue;
                text-align: center;
                padding: 5px;
            }

            .th1 {
                color: yellow;
            }

            .td1 {
                color: white;
            }
        </style>
    </head>

    <body>
        <?php
        include "dbcon.php";
        // echo $_SESSION['email'];
        $s1 = $_SESSION["email"];
        if (isset($_SESSION["email"])) 
        {
            $sql  = mysqli_query($conn,"SELECT * FROM admin_login WHERE email='$s1'"); 
            $num  = mysqli_num_rows($sql);

            $sql2 = mysqli_query($conn,"SELECT * FROM user_login WHERE email='$s1'");
            $num2 = mysqli_num_rows($sql2);

            // echo $num;
            // echo $num2;
            // echo $s1;

            if ($num > 0) 
            {
                $row = mysqli_fetch_array($sql);
                // $_SESSION['login'] = $row['email'];
                // echo $_SESSION['login_user'];
                ?>
                <div class="container-fluid"
                    style="position: -webkit-sticky; position: sticky; top: 0; background-color:blue; color:white">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Welcome to admin dashboard...</h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid ">
                    <?php
                    $sql    = " SELECT * FROM user_reg";
                    $squery = mysqli_query($conn, $sql);
                    ?>
                    <div class="row" style="">
                        <div class="col-sm-3 p-5 text-white" style="border: 1px solid black;     background-color:grey; padding:20px; ">
                            Reg.
                            Requests<br><br>
                            <a href="logout.php">
                                <div class="col-sm-12 btn btn-danger">Logout</div>
                            </a>
                        </div>
                        <div class="col-sm-9 p-5"
                            style="border: 1px solid black; background-color:lightgoldenrodyellow; min-height: 600px; ">
                            <?php while ($result = mysqli_fetch_assoc($squery)) { ?>
                                <div class="row" style="border:1px dashed black">
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-4"><b>Name:</b>
                                                <?php echo $result["name"]; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"> <b>Email:</b>
                                                <?php echo $result["email"]; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"><b>Mobile:</b>
                                                <?php echo $result["mobile"]; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12"><b>Address:</b>
                                                <?php echo $result["address"]; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"><b>Aadhar:</b>
                                                <?php echo $result["aadhar"]; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"><b>Password:</b>
                                                <?php echo $result["password"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" style="margin:auto">
                                        <a href="accept_data.php?aadhar=<?php echo $result[
                                            "aadhar"
                                        ]; ?>"><i class="fa-solid fa-check fa-2xl"
                                                style="color: #005200;"></i></a>   
                                        <a href="reject_data.php?aadhar=<?php echo $result[
                                            "aadhar"
                                        ]; ?>"><i class="fa-solid fa-xmark fa-2xl" style="color: #ff0000;"></i></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
             <?php 
            } 
            elseif ($num2 > 0) 
            {

                $row  = mysqli_fetch_array($sql2);
                $var1 = $row["aadhar"];
                // $_SESSION['login'] = $row['email'];
                $sql    = "SELECT * FROM passbook WHERE aadhar=$var1";
                $squery = mysqli_query($conn, $sql);
                $row1   = mysqli_fetch_array($squery);
                $sql1   = "SELECT * FROM history WHERE aadhar=$var1";
                $hquery = mysqli_query($conn, $sql1);
                $row2   = mysqli_fetch_array($hquery);
                ?>
                <div class="container-fluid"
                    style="background-color:blue;   position: -webkit-sticky; position: sticky; top: 0; background-color: blue; color:white">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 style="color:white; padding:5px">Welcome
                                <?php echo $row["name"]; ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row" style="">
                        <div class="col-sm-4" style="border:1px solid black; padding:20px; background-color:grey;">
                            <div class="row">
                                <button class="btn" data-bs-toggle="collapse" data-bs-target="#clps1"
                                    style=" border-radius: 0%;  text-align: left; background-color: yellow; color:darkblue; margin-bottom: 5px; ">Profile
                                </button>
                                <button class="btn" data-bs-toggle="collapse" data-bs-target="#clps2"
                                    style=" border-radius: 0%;  text-align: left; background-color: yellow; color:darkblue; margin-bottom: 5px;">
                                    withdrawal
                                </button>
                                <button class="btn" data-bs-toggle="collapse" data-bs-target="#clps3"
                                    style=" border-radius: 0%;  text-align: left; background-color: yellow; color:darkblue; margin-bottom: 5px;">Deposite
                                </button>
                                <button class="btn" data-bs-toggle="collapse" data-bs-target="#clps4"
                                    style=" border-radius: 0%;  text-align: left; background-color: yellow; color:darkblue; margin-bottom: 5px;">Passbook
                                </button>
                                <a href="logout.php">
                                    <div class="col-sm-12 btn btn-danger">Logout</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8" id="myGroup"
                            style=" border:1px solid black; min-height:600px; background-color:lightgoldenrodyellow; ">
                            <div class="row ">
                                <p>
                                <h4> Avl. Balance: Rs.
                                    <span style="color:Green">
                                        <?php echo $row1["total"]; ?>
                                    </span>
                                </h4>
                                </p>
                                <div class=" col-sm-12 story collapse " id="clps1" data-bs-parent="#myGroup">
                                    <p>
                                    <h5>Welcome to your profile</h5>
                                    </p>
                                    <form action="updateBack.php" method="post"
                                        style=" padding-top: 10px; padding-bottom:10px;margin:auto;  color:yellow; background-color:blue">
                                        <table style="margin:auto;">
                                            <th colspan="2" style="text-align:center">UPDATE YOUR INFORMATION</th>
                                            <tr>
                                                <td>Full Name:</td>
                                                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Aadhar:</td>
                                                <td><input type="text" name="aadhar" required value="<?php echo $row[
                                                    "aadhar"
                                                ]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mobile:</td>
                                                <td><input type="text" name="mobile" value="<?php echo $row["mobile"]; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td> <input type="email" name="email" required value="<?php echo $row[
                                                    "email"
                                                ]; ?>"> </td>
                                            </tr>
                                            <tr>
                                                <td>Addtess:</td>
                                                <td> <textarea type="text" name="address" style="width: 190px;"><?php echo $row[
                                                    "address"
                                                ]; ?></textarea> </td>
                                            </tr>
                                            <tr>
                                                <td>Password:</td>
                                                <td> <input type="password" name="password" value="<?php echo $row[
                                                    "password"
                                                ]; ?>"> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align:center">
                                                    <button type="submit" name="submit" id="idSubmit"> update</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class=" col-sm-12 story collapse " id="clps2" data-bs-parent="#myGroup">
                                    <h5>Welcome to withdrawal section:</h5>
                                    <form action="withdrawal.php" method="post">
                                        <table>
                                            <tr>
                                                <td>
                                                    Aadhar:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="aadhar" value="<?php echo $row["aadhar"]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Enter amount:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="inputwid">
                                                </td>
                                                <td>
                                                    <button type="submit" name="submit1" class="btn btn-danger"> Withdrawal
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class=" col-sm-12 story collapse " id="clps3" data-bs-parent="#myGroup">
                                    <h5>Welcome to Deposite section:</h5>
                                    <form action="deposite.php" method="post">
                                        <table>
                                            <tr>
                                                <td>
                                                    Aadhar:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="aadhar" value="<?php echo $row["aadhar"]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Enter amount:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="inputdep">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success" name="submit2"> Deposite </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class=" col-sm-12 story collapse " id="clps4" data-bs-parent="#myGroup">
                                    <div class="row">
                                        <h4 style="">Welcome to passbook section:</h4>
                                        <div class="col-sm-9" style="margin:auto">
                                            <table style="" class="table2">
                                                <th class="th1">Addhar</th>
                                                <th class="th1">Date</th>
                                                <th class="th1" style="color:red">Debit</th>
                                                <th class="th1" style="color:green">Credit</th>
                                                <th class="th1">Total</th>
                                                <?php while ($result = mysqli_fetch_assoc($hquery)) { ?>
                                                    <tr>
                                                        <td class="td1">
                                                            <?php echo $result["aadhar"]; ?>
                                                        </td>
                                                        <td class="td1">
                                                            <?php echo $result["date"]; ?>
                                                        </td>
                                                        <td class="td1">
                                                            <?php echo $result["debit"]; ?>
                                                        </td>
                                                        <td class="td1">
                                                            <?php echo $result["credit"]; ?>
                                                        </td>
                                                        <td class="td1">
                                                            <?php echo $result["total"]; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } 
            else 
            {
                echo "<script> alert('Invalid Id or Password');
                </script>";
                // echo "<script>location.href='Login.php'</script>";
            }
            ?>
            <?php
        }
        ?>
    </body>

    </html>
<?php } else { // if ($_POST['email']) {
    if (isset($_POST["email"])) {
        $_SESSION["email"] = $_POST["email"];
        echo "<script>location.href='Dashboard.php'</script>";
    } else {
        echo " <script> alert('Please Login...!!!') </script> ";
        echo "<script>location.href='Login.php'</script>";
    }
}
?>