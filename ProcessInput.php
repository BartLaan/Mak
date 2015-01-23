<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $insertKolom = key(reset($_GET));


    if($insertKolom = "Klant_ID")
    {
        exit;
    }

    fwrite($f, "nice[2]! \n");


    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();



    $kolommen = $stmt->fetch();
    fwrite($f, print_r($kolommen, true) . "\n"); 

    fwrite($f, "nice[2][2]! \n");


    while($kolom=stmt->fetch())
    {
        if($insertKolom == $kolom)
        {
            fwrite($f, "nice[3]! .\n");   
        }
    }

    fclose($f); 
    exit;
?>