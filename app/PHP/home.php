<?php 
    session_start();
    include("dataBase.php");

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
    <link rel="icon" href="assets/Logo.png">
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']?></h1>
    <h3><?php echo $_SESSION['username']?></h3>
    <div><h1><a href="logout.php">LogOut</a></h1></div>
    <h2>INBOX</h2>
    <h3>Reporting Status 
        <?php 
            if($_SESSION['type'] == 'staff') {
                echo 'pending:';
                echo $userData["programAssigned"]; 

                echo '<br>';
                $sql = 'SELECT * FROM student WHERE reportingStatus = 0;';

                /** @var mysqli $dbConnect */
                $result = $dbConnect->query($sql);

                if($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row['username'];
                        echo $row['name'];
                        echo "<br>";
                    }
                }
            } else if($_SESSION['type'] == 'student') {
                if($userData['reportingStatus'] == 0) {
                    echo('<a href="reportingForm.php">Reporting From</a>');
                } else {
                    echo('DONE');
                }
            }
        ?>
    </h3>
</body>
</html>