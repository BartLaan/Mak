<?php

    $f = fopen("/tmp/phpLog.txt", "w");


    $keyArray = array_keys($_GET);
    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();

    fwrite($f, $stmt . "\n");
    $keysToValidate = array_intersect(array_keys($stmt),  $keyArray);


    fwrite($f, "nice[2][2]! \n");
    $inputCorrect = NULL;


    foreach($keysToValidate as $key => $value)
    {
        $inputCorrect = false;

        if( filter_var($value, FILTER_VALIDATE_EMAIL) && $key == "Emailadres")
        {
            $inputCorrect = false;
        }

        else if(preg_match("/^[0-9]*$/", $value) && $key == "Telefoonnummer")
        {
            $inputCorrect = false;
        }
        else if(preg_match("/^[a-zA-z0-9]*$/", $value) && $key == "Huisnummer")
        {
            $inputCorrect = false;
        }
        else if(
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