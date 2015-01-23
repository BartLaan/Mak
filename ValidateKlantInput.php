<?php

    $f = fopen("/tmp/phpLog.txt", "w");


    $keyArray = array_keys($_GET);
    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();

    fwrite($f, $stmt . "\n");
    $keysToValidate = array_intersect(array_keys($stmt),  $keyArray);


    fwrite($f, "nice[2][2]! \n");



    foreach($keysToValidate as $key => $value)
    {
        $inputCorrect = true;

        if($key == "Emailadres")
        {
            
        } 
    }

        if($insertKolom == $kolom["COLUMN_NAME"])
        {
            fwrite($f, "nice[3]! .\n");   
        }
    }

 
    fclose($f);                            
?>