<?php

    include 'database_connect.php';

 
    $userArray = $_GET;
    $id = $userArray["ide"];
    

    $deletetSql = 'DELETE FROM Product WHERE Product_ID = ' . $id;
    $stmt = $db->prepare($deletetSql); 
    $stmt->execute();
?>