<?php
    session_start();
    include("PHP/dataBase.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = $_POST['userType'];
        if(empty($username) || empty($password) || empty($type)) {
            $outMessage = 'Empty Login Fields';
        } else {

            //Sanitization of Input
            $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $type = filter_var($type, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            switch ($type) {
                case 'admin':
                    //Admin Login
                    $outMessage = 'Command Disabled for now!';
                    // $sql = "SELECT * FROM admin WHERE username = $username";
                    break;
                case 'student':
                    //Student Login
                    $sql = "SELECT * FROM student WHERE id = $username";
                    break;
                case 'staff':
                    //Staff Login
                    $sql = "SELECT * FROM staff WHERE id = $username";
                    break;
                default:
                    //invalid Type
                    break;
            }
            try {
                /** @var mysqli $dbConnect */
                $result = $dbConnect->query($sql);
                    
                $row = $result->fetch_assoc();
                if(!empty($row)) {
                    if($username == $row['id'] && $password == $row['password']) {
                        $name = $row['name'];

                        $outMessage = 'Valid LogIn';

                        $_SESSION['username'] = $username;
                        $_SESSION['name'] = $name;
                        $_SESSION['userData'] = $row;
                        $_SESSION['userType'] = $type;

                        header("Location: PHP/home.php");
                        exit();
                    } else {
                        $outMessage = 'Invalid Password';
                    }
                } else echoToConsole("=ERROR=");
            } catch (mysqli_sql_exception) {
                $outMessage = 'Invalid User';
            }
        }
    }
    if(isset($outMessage)) {
        echoToConsole($outMessage);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CT University</title>
    <link rel="icon" href="assets/Logo.png">

    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/script.js" defer></script>
</head>
<body>
    <div class="MainWrapper">
        <div class="LoginWrapper">
            <form action="index.php" method="post">
                <select name="userType" id="userType">
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                    <!-- <option value="admin">Admin</option> -->
                </select>
                UserID<input type="text" name="username">
                Password<input type="text" name="password">
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html> 