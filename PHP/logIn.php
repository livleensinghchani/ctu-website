<?php 
    include("dataBase.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($userName)) {
            echoToConsole("ENTER A VALID USERNAME");
        } else if(empty($userPassword)) {
            echoToConsole("ENTER A VALID PASSWORD");
        }
    
        $sqlLog = "SELECT * FROM studentsoet WHERE regNumber = '$userName'";
        $result = mysqli_query($dbConnect, $sqlLog);

        $data = mysqli_fetch_assoc($result);
        
        if(empty($data)) {
            echoToConsole("Not Log In");
        } else {
            echoToConsole($data['studentPassword']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <form action="logIn.php" method="post">
    <h4>UserName</h4>
    <input type="text" name="userName"> <br> <br>
    <h4>UserPassword</h4>
    <input type="password" name="userPassword"> <br>
    <input type="submit" value="Submit">
    </form>
</body>
</html>