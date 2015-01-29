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


    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Product' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();


    $kolomNamen = array();
    while($kolomNaam = $stmt->fetch())
    {
        
        array_push($kolomNamen, $kolomNaam['COLUMN_NAME']);
    }


    $keysToValidate = array_intersect_key($userArray, array_flip($kolomNamen));
    

    fwrite($f, $keysToValidate . "\n");

    $inputCorrect = false;
    $reason = array();

    foreach($keysToValidate as $key => $value)
    {
        $inputCorrect = true;

        if( ($value == "" || strlen(preg_replace('/\s+/', '', $value)) < 1) && $key != "SecundaireInfo")
        {
            $reason[$key] = "Dit veld mag niet leeg zijn";
            $inputCorrect = false;

        }

        else if($key === "Prijs")
        {
            if(! preg_match("/^[0-9.]+$/", $value))
            {
                $reason[$key] = "Gebruik alleen cijfers";
                $inputCorrect = false;
                continue;
            }
            else if(substr_count($value, ".") > 1 || substr_count($value, ".") > 0 &&  strlen($value) < 3)
            {
                $reason[$key] = "Geen geldig prijs formaat";
                $inputCorrect = false;
                continue;
            }

            $prijsGescheiden = explode(".", $value);

            if(count($prijsGescheiden) < 2)
            {
                $reason[$key] = "Geen geldig prijs formaat";
                $inputCorrect = false;
            }
            
        }

        else if(! preg_match("/^[a-zA-z ]*$/", $value) && $key === "Productnaam")
        {
            $inputCorrect = false;
        }

        else if(!preg_match("/^[0-9]*$/", $value) && $key === "Voorraad")
        {
            $inputCorrect = false;
            $reason[$key] = "Gebruik alleen cijfers";
        }

        else if(! preg_match("/^[0-9]*$/", $value)  && $key === "Aanbieding")
        {
            $inputCorrect = false;
            $reason[$key] = "Gebruik alleen cijfers";
        }

        else if (! preg_match("/^[0-9]*$/", $value) && $key === "Gewicht")
        {
            $reason["Gewicht"] = "Gebruik alleen cijfers";
        }
    }

    
    echo  ($inputCorrect) ? 'true ' : 'false ';

    echo print_r($reason, true);

    fclose($f);                            
?>