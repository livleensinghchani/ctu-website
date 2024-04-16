<?php 
    session_start();
    include("../Core/dataBase.php");

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    }

    $userData = $_SESSION['userData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <?php //Development Use Only
        // echo '<meta http-equiv="refresh" content="2">'
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']?></h1>
    <h3><?php echo $_SESSION['username']?></h3>
    <div><h1><a href="../Core/logout.php">LogOut</a></h1></div>
    <?php 
        if($_SESSION['userType'] == 'staff') {
            if($userData['school'] = 'admin') {
                //NOTE - Iframe for admin page
                //LINK - app/PHP/adminPage.php

                echo '<iframe src="../AdminPage/adminPage.php" frameborder="0"></iframe>';
            } else {
                //NOTE - Iframe for staff page
                //LINK - app/PHP/staffPage.php
    
                echo '<iframe src="../StaffPage/staffPage.php" frameborder="0"></iframe>';
            }

        } else if($_SESSION['userType'] == 'student') {
            //NOTE - Iframe for student page
            //LINK - app/PHP/studentPage.php

            echo '<iframe src="../StudentPage/studentPage.php" frameborder="0"></iframe>';

        }
    ?>
</body>
</html>