<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $insertKolom = key(reset($_GET));

    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();

    $kolommen = $stmt->fetch();
    fwrite($f, $print_r($kolommen, true) . "\n"); 
    fwrite($f, "nice[2]! \n");

    foreach($kolommen as $row)
    {
        if($insertKolom == $kolommen)
        {
            fwrite($f, "nice! .\n");   
        }
    }

    fclose($f); 
    exit;
?>