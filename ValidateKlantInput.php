<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    if(isset($_GET))
    {
        $keyArray = array_keys($_GET);
    }
    else
    {
        $keyArray = array_keys($_POST);
    }

    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();


    $coolArr = $stmt->fetchAll();
    echo print_r(array_keys($coolArr), true);

    echo print_r(array_keys($stmt->fetch()), true);



    $keysToValidate = array_intersect(array_keys($stmt->fetchAll()),  $keyArray);

    fwrite($f, "nice[2][2]! \n");

    $inputCorrect = false;
    $reason = array();


    foreach($keysToValidate as $key => $value)
    {
        $inputCorrect = true;

        echo "Cool!";
        if($key == "Emailadres")
        {
            if(!filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                $inputCorrect = false;
                $reason["Emailadres"] = "Dit is geen correct email adres";
                continue;
            }

            if($value = "")
            {
                $inputCorrect = false;
                $reason["Emailadres"] = "Dit is geen correct email adres";
                continue;
            }

			$sqlMailCheck = "SELECT Emailadres FROM Klant WHERE Emailadres ='" . $MAIL . "'";

            $stmt = $db->prepare($sqlMailCheck);
			$stmt->execute();

		    
			if(mysql_num_rows($stmt) > 0)
            {
				$reason["Emailadres"] = "Dit emailadres is al geregistreerd.";
				$inputCorrect = false;
			}
            
        }

        else if(!(preg_match("/^[0-9]*$/", $value) && $key == "Telefoonnummer" && $value = ""))
        {
            $inputCorrect = false;
            $reason["Telefoonnummer"] = "Dit telefoonnummer is niet geldig";
        }

        else if(!(preg_match("/^[a-zA-z0-9]*$/", $value) && $key == "Huisnummer" && $value = ""))
        {
            $inputCorrect = false;
            $reason["Huisnummer"] = "Dit huisnummer is niet geldig";
        }

        else if(!(preg_match("/^[a-zA-z0-9 ]*$/", $value) && $key == "Straat" && $value = ""))
        {
            $inputCorrect = false;
            $reason["Straat"] = "Dit is geen geldige straatnaam";
        }

        else if(!(preg_match("/^[a-zA-z0-9]*$/", $value) && $key == "Postcode" && $value = "")) 
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

            if($value = "")
            {
                $reason["Geslacht"] = "Vul een geslacht in";
                $inputCorrect = false;
            }

        }
        
        else if(!(preg_match("/^[a-zA-z ]*$/", $value) && $key == "Achternaam" && $value = ""))
        {
            $inputCorrect = false;
            $reason["Achternaam"] = "Er mogen alleen letters en spaties in de achternaam";
        }

        else if(!(preg_match("/^[a-zA-Z ]*$/", $value) && $key == "Voornaam" && $value = ""))
        {

            $inputCorrect = false;
            $reason["Voornaam"] = "Er mogen alleen letters voorkomen in de voornaam";
        }
    }

    
//    echo  ($inputCorrect) ? 'true' : 'false';
    echo print_r($reason, true);

    fclose($f);                            
?>