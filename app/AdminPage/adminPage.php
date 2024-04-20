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
    <title>adminPage</title>

<!--SECTION - JS Version  -->
    <script src="JS/script.js?v=<?php echo $version ?> defer"></script>
<!--!SECTION -->
</head>
<body>
    <button id="Student" type="submit" onclick="sideBar('Student')">Student</button>
    <button id="Staff" type="submit" onclick="sideBar('Staff')">Staff</button>
    <button id="Admin" type="submit" onclick="sideBar('Admin')">Admin</button>
    <div id="dataPanel">
        <!-- LINK - app\Core\defaultFrame.html -->
        <iframe src="../Core/defaultFrame.html" frameborder="0"></iframe>
    </div>
</body>
</html>