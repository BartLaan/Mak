<?php

    include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");

 
    $userArray = $_GET;
    $id = $userArray["ide"];
    

    $deletetSql = 'DELETE FROM Product WHERE Product_ID = ' . $id;
    $stmt = $db->prepare($deletetSql); 
    $stmt->execute();

    
    fclose($f); 
?>