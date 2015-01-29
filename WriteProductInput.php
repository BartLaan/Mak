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

    $keysToValidate = array_intersect_key($_POST, array_flip($kolomNamen));
    

    $existingProductSql = "SELECT Productnaam FROM Product WHERE Product_ID = " . $_POST["id"] . " LIMIT 1";
    $stmt = $db->prepare($existingProductSql); 
    $stmt->execute();

    if(!$stmt->fetch())
    {
        $insertQuery = "INSERT INTO Product (";
        foreach(array_keys($keysToValidate) as $key)
        {
            $insertQuery .= $key . ", ";
        }
        $insertQuery = substr($insertQuery, 0, -1);
        $insertQuery .= ") VALUES ( ";
        foreach($keysToValidate as $key => $value)
        {
            if($key == "Vooraad" || $key == "Gewicht" || $key == "Prijs"  || $key == "Aanbieding")
            { 
                $insertQuery .= $value . ", ";
            }
         
            else
            {
                $insertQuery .= '"' . $value . '", ';
            }
        }
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
        $insertQuery .= ' WHERE Product_ID = ' . $_POST["id"] . ';';
    }
    
    $stmt = $db->prepare($insertQuery); 
    fwrite($f, $insertQuery . "\n");

//    $stmt->execute();

    fclose($f); 
?>