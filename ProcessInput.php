<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $arr = $_GET;
    reset($arr);

    $insertKolom = key($arr);


    if($insertKolom == "Klant_ID")
    {
        exit;
    }

    fwrite($f, $arr . "\n");
    fwrite($f, print_r($insertKolom, true) . "\n");


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