<?php 
    session_start();
    include("dataBase.php");

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    }

    $userData = $_SESSION['userData'];
?>
<!-- NOTE - Staff Page -->
<?php
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
    } catch(mysqli_sql_exception) {
        $outMessage = 'Invalid Password';
    }
?>