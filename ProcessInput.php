<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $insertKolom = key(reset($_GET));

    $kolommenSql = "select * from information_schema.columns
 where table_name = 'Klant'";
    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();

    $kolommen = $stmt->fetch();
    fwrite($f, $kolommen . "\n"); 
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