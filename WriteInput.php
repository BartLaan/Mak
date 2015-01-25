<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");

    if(isset($_GET))
    {
        $userArray = $_GET;
    }
    else
    {
        $userArray = $_POST;
    }

    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();

    $kolomNamen = array();
    while($kolomNaam = $stmt->fetch())
    {
        
        array_push($kolomNamen, $kolomNaam['COLUMN_NAME']);
    }

    $keysToValidate = array_intersect_key($_GET, array_flip($kolomNamen));

    $insertQuery = "INSERT INTO Klant (";

    foreach($keysToValidate as $key => $value)
    {
        $insertQuery .= $key . ", ";        
    }

    $insertQuery = substr($insertQuery, 0, -1);
    $insertQuery .= ") VALUES (";

    foreach($keysToValidate as $key => $value)
    {
        $insertQuery .= "'" . $value . "',"; 
    }

    $insertQuery = substr($insertQuery, 0, -1);
    $insertQuery .= ")";

    $stmt = $db->prepare($insertQuery); 
//    $stmt->execute();

    fclose($f); 
?>