<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="fileName">
        <button>Sumbit</button>
    </form>
</body>
</html>

<?php
    $myFile = array("Shit"=>"ME", "Shit1"=>"ME1", "Shit2"=>"ME2", "Shit3"=>"ME3");

    $printFile = $myFile[$_POST["fileName"]];
    echo $printFile;
?>