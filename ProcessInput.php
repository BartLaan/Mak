<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $insertKolom = key(reset($_GET));


    if($insertKolom == "Klant_ID")
    {
        exit;
    }

    fwrite($f, $insertKolom . "\n");
    fwrite($f, $_GET . "\n");


    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();




    fwrite($f, "nice[2][2]! \n");


    while($kolom=$stmt->fetch())
    {    
        
        fwrite($f, print_r($kolom["COLUMN_NAME"], true) . "\n"); 

        if($insertKolom == $kolom)
        {
            fwrite($f, "nice[3]! .\n");   
        }
    }

    fclose($f); 
    exit;
?>