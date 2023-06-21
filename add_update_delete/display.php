<?php
include "dbcon.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Display</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    error_reporting(0);
    $sql    = "SELECT * FROM table1";
    $squery = mysqli_query($conn, $sql);
    ?>
    <div>
        <table>
            <?php while (($result = mysqli_fetch_assoc($squery))) { ?>
                <tr>
                    <td>
                        <?php echo $result['name']; ?>
                    </td>
                    <td>
                        <?php echo $result['aadhar']; ?>
                    </td>
                    <td>
                        <?php echo $result['email']; ?>
                    </td>
                    <td>
                        <?php echo $result['password']; ?>
                    </td>
                    <td>
                        <a href="delete_data.php?aadhar=<?php echo $result['aadhar']; ?>">Delete</a>&nbsp;
                        <a href="update_data.php?aadhar=<?php echo $result['aadhar']; ?>">Update</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>