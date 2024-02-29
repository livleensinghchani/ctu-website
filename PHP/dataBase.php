<?php 
        // To make php print debug in console
    function echoToConsole($dataOut) {
            // check in console!
        echo '<script> console.log("'.$dataOut.'");</script>';
    }
        
        // db credentials
    $dbUserName = "root";
    $dbUserPass = "";
    $dbServer = "localhost";
    $dbName = "ctu";
    $dbConnect = '';

    try {
        $dbConnect = mysqli_connect($dbServer, $dbUserName, $dbUserPass, $dbName);
    } catch (mysqli_sql_exception) {
        echoToConsole("Invalid Connection Details");
    }

       
    if($dbConnect) {  // check if connection success
        echoToConsole("Connection Success"); 
    } else {
        echoToConsole("Connection Fail");
    }
?>