<?php
    $db_server = 'localhost';
    $db_name = 'ctu';
    $db_user = 'root';
    $db_password = 'a';

    $connection = '';
    try{
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    } catch (mysqli_sql_exception) {
        echo("Connection Failed");
    }

    if($connection) {
        echo("You are Connected");
    }
?>