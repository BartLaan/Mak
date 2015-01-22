

<?php 

    $f = fopen("/tmp/phpLog.txt", "w");

    $db = new PDO('mysql:host = localhost; dbname=Mak', 'rijnder', 'GodspeedF#A#');
    $db->setAttribute(PDO::ERRMODE_SILENT,PDO::CASE_NATURAL);

    $orderingColumn;

    $disabledCategories = array();
    foreach($_GET as $key => $value)
    {
        if(substr( $key, 0, 3) === "cat")
        {
            array_push($disabledCategories, $value);
        }
        if(substr( $key, 0, 3) === "ord")
        {
            $orderingColumn = $value;
        }
    }

    if(!isset($orderingColumn))
    {
        $orderingColumn = "Productnaam";
    }

    

    $productenSql = "SELECT Prijs, Categorie, Productnaam, SecundaireInfo, img_filepath, Aanbieding, Product_ID
FROM Product";
    if(count($disabledCategories) > 0)
    {
        $productenSql .= " WHERE  (";
        foreach($disabledCategories as $disabledCategorie)
        {
            $productenSql .= ' Categorie <>	"' . $disabledCategorie . '" AND ';
        }
        $productenSql = substr($productenSql, 0, -4);
        $productenSql .= ")";
    }

    $productenSql .= ' ORDER BY ' . $orderingColumn;

    if($orderingColumn == "Prijs")
    {
        // Yeah...
    }


    fwrite($f , $productenSql . "\n");

    $stmt = $db->prepare($productenSql); 
    $stmt->execute();

    if($stmt->rowCount() < 1)
    {
        echo "Geen producten geselecteerd.";
    }

    else
    {
        while($row =$stmt->fetch() )
        {
    
            require_once('RemoveLeadingZeroes.php');

            $id = $row["Product_ID"];
            echo '<a class ="product" href="ProductPagina.php?id=$id" name = "' . $row['Categorie'] . '">';
            echo '<div class="productAfbeelding">';
            echo '<img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '"></img><br>';
            echo '</div>';
            echo ' <hr>';
        
            echo '<div class="productNaam">' .  $row['Productnaam']. '</div>';
    
            if ( strlen($row["SecundaireInfo"]) != NULL)
            {
                echo '<span class="secundaire-info">' . $row["SecundaireInfo"] . '</span>';
            }
    
            echo "<br>";

            $prijsTrimmed = trimLeadingZeroes($row["Prijs"]);
            $aanbiedingTrimmed =  trimLeadingZeroes($row["Aanbieding"]);

            if ( strlen($row["Productnaam"]) < 22 )
            {
                echo "<br>";
            }
            
            if( $row['Aanbieding'] == 0)    // Geen aanbieding
            {   
                echo "<br>";
                echo '<span class="prijstekst">&euro;' . $prijsTrimmed . '</span>';
            }
            else
            {
                echo '<span class="prijstekst" id="afgeprijst">&euro;' . $prijsTrimmed . '</span>';
                echo '<br><span class="afgeprijst">&euro;' . $aanbiedingTrimmed . ' </span>';
            }
    
            echo "<br>";
            echo "</a>";    
        }
    fclose($f); 
    }
?>