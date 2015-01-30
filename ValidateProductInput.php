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



    $inputCorrect = true;
    $reason = array();

    foreach($keysToValidate as $key => $value)
    {

        if( ($value == "" || strlen(preg_replace('/\s+/', '', $value)) < 1) && $key != "SecundaireInfo")
        {
            $inputCorrect = false;
            if($key == "Productnaam")
            {
                $reason[$key] = '"Naam" mag niet leeg zijn';
            }
            else if($key == "img_filepath")
            {
                $reason[$key] = '"Afbeelding" mag niet leeg zijn';

            }
            else
            {
                $reason[$key] = '"' . $key  .'" mag niet leeg zijn';
            }
                

        }

        else if($key === "Prijs" || $key === "Aanbieding")
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
            $reason[$key] = "Geen geldige naam";
            $inputCorrect = false;
        }

        else if(!preg_match("/^[0-9]*$/", $value) && $key === "Voorraad")
        {
            $inputCorrect = false;
            $reason[$key] = "Gebruik alleen cijfers";
        }


        else if (! preg_match("/^[0-9]*$/", $value) && $key === "Gewicht")
        {
            $inputCorrect = false;
            $reason["Gewicht"] = "Gebruik alleen cijfers";
        }
    }

    $deWaarheid = $inputCorrect ? 'true ' : 'false ';
    fwrite($f, "Wow: " . print_r($deWaarheid,true) . "\n");

    echo  ($inputCorrect) ? 'true ' : 'false ';

    echo print_r($reason, true);

    fclose($f);                            
?>