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
            if($_SESSION['userType'] == 'staff') {
                //TODO: Staff Panel 
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM class WHERE mentor = $username;";

                try {
                    /** @var mysqli $dbConnect */
                    $classAssigned = $dbConnect->query($sql);

                    if($classAssigned->num_rows > 0) {
                        while($row = $classAssigned->fetch_assoc()) {
                            echo "Program: " . $row['program'] . $row['section'];
                        }
                    } else {
                        echo "No Class Assigned";
                    }

                } catch(mysqli_sql_exception) {
                    $outMessage = 'Invalid Password';
                }
                
            } else if($_SESSION['userType'] == 'student') {
                if(!$userData['reporting_form']) {
                    echo('<a href="reportingForm.php">Reporting From</a>');
                } else {
                    echo('DONE');
                }
            }

            if(isset($outMessage)) {
                echoToConsole($outMessage);
            }
        ?>
    </h3>
</body>
</html>