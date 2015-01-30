<?php

    #include 'database_connect.php';

    $f = fopen("/tmp/phpLog.txt", "w");

 
    $userArray = $_GET;
    $id = $userArray["ide"];
    
    $delete_doorverwijzing = 'DELETE FROM Product_Bestelling_Doorverwijzing WHERE Product_ID = "'.$id.'"';
    $d_d = $db->prepare($delete_doorverwijzing);
    $d_d->execute();

    $delete_recensie = 'DELETE FROM Recensies WHERE Product_ID = "'.$id.'"';
    $d_r = $db->prepare($delete_recensie);
    $d_r->execute();

    $deletetSql = 'DELETE FROM Product WHERE Product_ID = "' . $id. '"';
    $stmt = $db->prepare($deletetSql); 
//    $stmt->execute();
    
    fclose($f); 
?>