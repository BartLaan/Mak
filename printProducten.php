<?php function printProducten()
            {
                $disabledCategories = array();
                foreach($_GET as $key => $value)
                {
                    if(substr( $key, 0, 3) === "cat")
                    {
                       print_r($value);
                       array_push($disabledCategories, $value);
                    }
                }

                $productenSql = "SELECT TRIM(LEADING '0'
    FROM Prijs), Productnaam, SecundaireInfo, img_filepath, Aanbieding, Product_ID
    FROM Product ORDER BY " . $orderingColumn;
                if(count($disabledCategories) > 0)
                {
                    $productenSql .= " WHERE  (";
                    foreach($disabledCategories as $disabledCategorie)
                    {
                        $productenSql .= " Categorie != " . $disabledCategorie . " AND ";
                    }
                    $productenSql = substr($productenSql, 0, -3);
                    $productenSql .= ")";
                }
                
                $stmt = $db->prepare($productenSql); 
                $stmt->execute();
     
                while($row =$stmt->fetch() )
                {
                    // Not sure if '#' is correct here
                    $id = $row["Product_ID"];
                    echo "<a class ='product' href='ProductPagina.php?id=$id'>" ;
                    echo '<div class="productAfbeelding">';
                    echo '<img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '"></img><br>';
                    echo '</div>';
                    echo ' <hr>';
                    // Geen ondersteuning speciale chars
    
                    // Niet de juiste manier
    
                    echo '<div class="productNaam">' .  $row['Productnaam']. '</div>';
    
                    if ( strlen($row["SecundaireInfo"]) != NULL)
                    {
                        echo '<span class="secundaire-info">' . $row["SecundaireInfo"] . '</span>';
                    }
        
                    echo "<br>";
    
                    if ( strlen($row["Productnaam"]) < 22 )
                    {
                        echo "<br>";
                    }
                    
                    if( $row['Aanbieding'] == 0)    // Geen aanbieding
                    {   
                        echo "<br>";
                        echo '<span class="prijstekst"> &euro;' . $row["TRIM(LEADING '0'
    FROM Prijs)"] . '</span>';
                    }
                    else
                    {
                        echo '<span class="prijstekst" id="afgeprijst"> &euro;' .$row["TRIM(LEADING '0'
    FROM Prijs)"] . '</span>';
                        echo '<br><span class="afgeprijst">&euro;' . $row["Aanbieding"] . ' </span>';
                    }
    
                    echo "<br>";
                    echo "</a>";    
                }
            }
?>