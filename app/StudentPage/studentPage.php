<?php 
    session_start();
    include("../Core/dataBase.php");

    if(!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit;
    }

    $userData = $_SESSION['userData'];
?>

<?php 
    if(!$userData['reporting_form']) {
        echo('<a href="../Forms/ReportingForm/reportingForm.php">Reporting From</a>');
    } else {
        echo('DONE');
    }
?>