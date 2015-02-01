<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");

 
    $userArray = $_GET;
    $id = $userArray["id"];
    

    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Product' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();
    
    $kolomNamen = array();
    while($kolomNaam = $stmt->fetch())
    {
        array_push($kolomNamen, $kolomNaam['COLUMN_NAME']);
    }

    $keysToValidate = array_intersect_key($userArray, array_flip($kolomNamen));
    
    $insertQuery = "UPDATE Product SET ";


    foreach($keysToValidate as $key => $value)
    {
        $insertQuery .= $key . '= "' . $value . '",';  
      
    }

    $insertQuery = substr($insertQuery, 0, -1);


    $insertQuery .= ' WHERE Product_ID = ' . $_GET["id"] . ';';

    
    $stmt = $db->prepare($insertQuery); 
    fwrite($f, $insertQuery . "\n");

    $stmt->execute();

    fclose($f); 

    /*$existingProductSql = 'SELECT Productnaam FROM Product WHERE Product_ID = ' . $id . ' LIMIT 1';
    $stmt = $db->prepare($existingProductSql); 
    $stmt->execute();

    if(!$stmt->fetch())
    {

        $insertQuery = "INSERT INTO Product (";
        foreach(array_keys($keysToValidate) as $key)
        {
            $insertQuery .= $key . ",";
        }
        $insertQuery = substr($insertQuery, 0, -1);
        $insertQuery .= ") VALUES ( ";
        foreach($keysToValidate as $key => $value)
        {
            if($key == "Beschrijving")
            {
                exit();
            }

            if($key == "Vooraad" || $key == "Gewicht" || $key == "Prijs"  || $key == "Aanbieding")
            { 
                $insertQuery .= $value . ", ";
            }
         
            else
            {
                $insertQuery .= '"' . $value . '",';
            }
        }
        $insertQuery = substr($insertQuery, 0, -1);
        $insertQuery .= ")";
    }

    else
    {
        $insertQuery = "UPDATE Product SET ";
        
        foreach($keysToValidate as $key => $value)
        {
            if($key == "Vooraad" || $key == "Gewicht" || $key == "Prijs" || $key == "Aanbieding")
            { 
                $insertQuery .= $key . '= ' . $value . ',';
            }
            else
            {
                $insertQuery .= $key . '= "' . $value . '",';
            }
        }
        $insertQuery = substr($insertQuery, 0, -1);
        $insertQuery .= ' WHERE Product_ID = ' . $id . ';';
    }
    
    $stmt = $db->prepare($insertQuery); 
    $stmt->execute();

    fwrite($f, "uhm cool " . $insertQuery . "\n");

    fclose($f);  */
?>