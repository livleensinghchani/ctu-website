<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    }

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogOut</title>
</head>
<body>
    <h1>You were Loged Out!</h1>
    <div><h1><a href="../index.php">LogIn</a></h1></div>
</body>
</html>