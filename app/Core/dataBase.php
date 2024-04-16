<?php 
        // To make php print debug in console
    function echoToConsole($dataOut) {
            // check in console!
        echo '<script> console.log("'.$dataOut.'");</script>';
    }
//SECTION - Check if Build is Production or Development
    $productionBuild = false;
    
    //NOTE - Production Version
    $versionFile = "A0.01";
    $version = 4;
    if($productionBuild) {
        $version = $versionFile;
    } else {
        $version = time();
    }


    $dbLog;
        
        // db credentials
    $dbUserName = "root";
    $dbUserPass = "core";
    $dbServer = "db";
    $dbName = "ctu";
    $dbConnect = '';

    try {
        $dbConnect = mysqli_connect($dbServer, $dbUserName, $dbUserPass, $dbName);
    } catch (mysqli_sql_exception $e) {
        $dbLog = 'Invalid Connection Details';
    }

    if(!$dbConnect) {  // check if connection not successful
        $dbLog = 'Connection Fail';
    }

    if(isset($dbLog)) {
        echoToConsole($dbLog);
    }

?>