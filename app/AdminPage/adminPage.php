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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminPage</title>

<!--SECTION - JS Version  -->
    <script src="JS/script.js?v=<?php echo $version ?>"></script>
<!--!SECTION -->
</head>
<body>
    <button id="Student" type="submit">Student</button>
    <button id="Staff" type="submit">Staff</button>
    <button id="Admin" type="submit">Admin</button>
</body>
</html>