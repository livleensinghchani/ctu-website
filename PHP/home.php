<?php 
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    } else {
        echo($_SESSION['username']);
        echo($_SESSION['name']);
        echo($_SESSION['type']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="icon" href="assets/Logo.png">
</head>
<body>
    
</body>
</html>