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
        
    $insertQuery = "UPDATE Klant SET ";


    foreach($keysToValidate as $key => $value)
    {
        $insertQuery .= $key . '= "' . $value . '",';  
      
    }

    $insertQuery = substr($insertQuery, 0, -1);


    $insertQuery .= ' WHERE Klant_ID = ' . $_GET["id"] . ';';

    
    $stmt = $db->prepare($insertQuery); 
    fwrite($f, $insertQuery . "\n");

    $stmt->execute();

    fclose($f); 
?>