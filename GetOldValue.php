<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");


    $oldValueQuery = 'SELECT ' . $_GET["$result"] . 'FROM Klant WHERE Costumer_id="' . $_GET["id"] . '"';

    $stmt = $db->prepare($oldValueQuery);
    $result = $stmt->fetch();
    
    echo $result["$result"];
 
    fclose($f);                            
?>