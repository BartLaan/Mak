<?php

    include 'database_connect.php';



    if(isset($_GET))
    {
        $userArray = $_GET;
    }
    else
    {
        $userArray = $_POST;
    }


    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();


    $kolomNamen = array();
    while($kolomNaam = $stmt->fetch())
    {
        
        array_push($kolomNamen, $kolomNaam['COLUMN_NAME']);
    }

    // Strip the keys that are not included in the databese
    $keysToValidate = array_intersect_key($userArray, array_flip($kolomNamen));


    $inputCorrect = true;
    $reason = array();

    foreach($keysToValidate as $key => $value)
    {

        if( ($value == "" || strlen(preg_replace('/\s+/', '', $value)) < 1) && $key != "Telefoonnummer" )
        {
            $reason[$key] = "Dit veld mag niet leeg zijn";
            $inputCorrect = false;

        }

        else if($key === "Emailadres")
        {
            if(!filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                $inputCorrect = false;
                $reason["Emailadres"] = "Geen geldig e-mailadres";
                continue;
            }

			$sqlMailCheck = "SELECT Emailadres FROM Klant WHERE Emailadres ='" . $value. "'";

            $stmt = $db->prepare($sqlMailCheck);
			$stmt->execute();

		    
			if(count($stmt->fetchAll()) > 0)
            {
				$reason["Emailadres"] = "Dit emailadres is al geregistreerd";
				$inputCorrect = false;
			}
        }

        else if(! preg_match("/^[0-9]*$/", $value) && $key === "Telefoonnummer")
        {
            $inputCorrect = false;
            $reason["Telefoonnummer"] = "Dit telefoonnummer is niet geldig";
        }

        else if(! preg_match("/^[a-zA-z0-9]*$/", $value) && $key === "Huisnummer")
        {
            $inputCorrect = false;
            $reason["Huisnummer"] = "Dit huisnummer is niet geldig";
        }

        else if(! preg_match("/^[a-zA-z0-9 ]*$/", $value)  && $key === "Straat")
        {
            $inputCorrect = false;
            $reason["Straat"] = "Dit is geen geldige straatnaam";
        }

        else if(! preg_match("/^[a-zA-z0-9]*$/", $value)  && $key === "Postcode") 
        {
            $inputCorrect = false;
            $reason["Postcode"] = "Dit is geen geldige postcode";
        } 

        else if($key == "Geslacht")
        {
            if(!is_numeric($value))
            { 
                $reason["Geslacht"] = "Dit is geen bestaand geslacht";
                $inputCorrect = false;
                continue;
            }
        }

        else if (! preg_match("/^[a-zA-z ]*$/", $value) && $key == "Woonplaats")
        {
            $reason["Woonplaats"] = "Dit is geen geldige woonplaats";

        }
        
        else if(! preg_match("/^[a-zA-z ]*$/", $value)  && $key == "Achternaam" )
        {
            $inputCorrect = false;
            $reason["Achternaam"] = "Alleen letters en spaties zijn toegestaan";
        }

        else if(! preg_match("/^[a-zA-Z]*$/", $value) && $key === "Voornaam")
        {

            $inputCorrect = false;
            $reason["Voornaam"] = "Alleen letters zijn toegestaan";
        }
    }

    
    echo  ($inputCorrect) ? 'true ' : 'false ';
    echo print_r($reason, true);
?>