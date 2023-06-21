<?php
include 'dbcon.php';

$aadhar = $_GET['aadhar'];
$sql    = "SELECT * FROM table1 WHERE aadhar=$aadhar";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <form action="update_back.php" method="post">
        <?php while ($fresult = mysqli_fetch_assoc($result)) { ?>
            Name:<input type="text" name="name" value="<?php echo $fresult['name']; ?>"><br>
            Email:<input type="text" name="email" value="<?php echo $fresult['email']; ?>"><br>
            Aadhar:<input type="text" name="aadhar" value="<?php echo $fresult['aadhar']; ?>"><br>
            Password:<input type="text" name="password" value="<?php echo $fresult['password']; ?>"><br>
            <button type="submit" name="submit">Submit</button>
        <?php } ?>
    </form>
</body>

</html>