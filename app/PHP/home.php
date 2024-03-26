<?php 
    session_start();
    include("dataBase.php");

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    }
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
    <link rel="icon" href="assets/Logo.png">
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']?></h1>
    <h3><?php echo $_SESSION['username']?></h3>
    <div><h1><a href="logout.php">LogOut</a></h1></div>
    <h2>INBOX</h2>

</body>
</html>