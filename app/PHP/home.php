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
    <h3>Reporting Status</h3>
    <?php 
        if($_SESSION['userType'] == 'staff') {
            //SECTION: Staff Panel 
            $username = $_SESSION['username'];
            
            try {
                $classSQL = "SELECT * FROM class WHERE mentor = $username;";
                /** @var mysqli $dbConnect */
                $classList = $dbConnect->query($classSQL);

                if($classList->num_rows > 0) {
                    while($d_class = $classList->fetch_assoc()) {
                        echo "Program: " . $d_class['program'] . $d_class['section'];
                        
                        $classId = $d_class['id'];
                        $studentSQL = "SELECT * FROM student WHERE class = $classId ORDER BY id ASC;";

                        /** @var mysqli $dbConnect */
                        $studentList = $dbConnect->query($studentSQL);

                        if($studentList->num_rows > 0) {
                            while($d_student = $studentList->fetch_assoc()) {
                                echo "<br>". $d_student['id'] . $d_student['name'] ."<br>";
                            }
                        }

                        echo "<br>";
                        // REVIEW Remove me!
                       
                    }
                } else {
                    echo "No Class Assigned";
                }
                // !SECTION Staff Panel Ends
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
</body>
</html>