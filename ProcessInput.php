<?php

    include 'database_connect.php';
    include 'ValidateInput.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    // comment?
    if(isset($inputCorrect)) // Some illegal information was provided to validateInput
    {
        exit;
    }

    $arr = $_GET;
    reset($arr);

	$DATA = trim($DATA);
	$DATA = stripslashes($DATA);
	$DATA = htmlspecialchars($DATA);

    $insertKolom = key($arr);


    if($insertKolom == "Klant_ID")
    {
        exit;
    }

    fwrite($f, print_r($insertKolom, true) . "\n");


    $kolommenSql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'Klant' ORDER BY ORDINAL_POSITION;";

    $stmt = $db->prepare($kolommenSql); 
    $stmt->execute();

    fwrite($f, "nice[2][2]! \n");


    while($kolom=$stmt->fetch())
    {    
        fwrite($f, print_r($kolom["COLUMN_NAME"], true) . "\n"); 

        if($insertKolom == $kolom["COLUMN_NAME"])
        {
            fwrite($f, "nice[3]! .\n");   
        }
    }

    fclose($f); 
?>