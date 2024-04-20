<?php 
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/Core/dataBase.php');

    if(!isset($_SESSION['username'])) {
        header("Location: " . $_SERVER['DOCUMENT_ROOT'] . 'index.php');
        exit;
    }

    $userData = $_SESSION['userData'];
?>
<?php
//SECTION - SLQ Data Request For Class
    $sqlClassList = "SELECT * FROM class;";
    /** @var mysqli $dbConnect */
    $dataClassList = $dbConnect->query($sqlClassList);
//!SECTION

//SECTION - SQL Data Request For School
    $sqlSchoolList = "SELECT * FROM school;";
    /** @var mysqli $dbConnect */
    $dataSchoolList = $dbConnect->query($sqlSchoolList);
//!SECTION

//SECTION - SQL Data Request For Program
    $sqlProgramList = "SELECT * FROM program;";
    /** @var mysqli $dbConnect */
    $dataProgramList = $dbConnect->query($sqlProgramList);
//!SECTION
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insertStudent</title>

<!--SECTION - JS Version  -->
    <script src="JS/script.js?v=<?php echo $version ?>" defer></script>
<!--!SECTION -->

</head>
<body>
    <input type="text">
    <button type="button">Filter</button>
<!-- SECTION - Filter For Searching the class  -->
    <form action="insertStudent.php" method="post">
        <?php
            if($dataSchoolList->num_rows > 0) {
                while($dlSchool = $dataSchoolList->fetch_assoc()) {
                //Skips the Admin school as it is not required in the list
                    if($dlSchool['id'] == 'admin') {
                        continue;
                    }

                    echo ('<input type="radio" onchange=schoolSelect("'.$dlSchool['id'].'") name="schoolOption" id="schoolOption" value='.$dlSchool["id"].'>'.$dlSchool["id"]);
                }
            }
            if($dataProgramList->num_rows > 0) {
                while($dlProgram = $dataProgramList->fetch_assoc()) {
                    echo ('<div class="programOption"><input class="programOption" type="radio" id='. $dlProgram['school'] .' value='.$dlProgram["id"].'>'.$dlProgram["id"])."</div>";
                }
            }
        ?>
        

        
        
        <button type="button"></button>
    </form>
<!-- !SECTION -->
    <?php
        // if($dataClassList->num_rows > 0) {
        //     while($dlClass = $dataClassList->fetch_assoc()) {
        //         echo $dlClass['program'];
        //     }
        // }

        // if(isset($_POST['schoolSelect'])){
        //     echo ("SET");
        // }
    ?>
</body>
</html>