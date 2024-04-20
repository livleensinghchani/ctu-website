<?php 
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/Core/dataBase.php');

    if(!isset($_SESSION['username'])) {
        header("Location: " . $_SERVER['DOCUMENT_ROOT'] . 'index.php');
        exit;
    }

    $userData = $_SESSION['userData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTU</title>
</head>
<body>
    <a href="insertStudent/insertStudent.php">Add New Student</a>
    <button type="button">Find A Student</button>
</body>
</html>