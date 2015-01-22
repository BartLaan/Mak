<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $insertKolom = key(reset($_GET));

    $kolommenSql = "SHOW COLUMNS FROM table_name";
    $stmt = $db->prepare($collumnenSql); 
    $stmt->execute();

    $kolommen = $stmt->fetch();
    fwrite($f, $kolommen . "\n"); 


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