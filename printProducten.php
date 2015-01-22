

<?php 

    $f = fopen("/tmp/phpLog.txt", "w");

    $db = new PDO('mysql:host = localhost; dbname=Mak', 'rijnder', 'GodspeedF#A#');
    $db->setAttribute(PDO::ERRMODE_SILENT,PDO::CASE_NATURAL);
    
    $orderingColumn = "Productnaam";


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

    $productenSql = "SELECT Prijs, Productnaam, SecundaireInfo, img_filepath, Aanbieding, Product_ID
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
    
            include('RemoveLeadingZeroes.php');

            $id = $row["Product_ID"];
            echo "<a class ='product' href='ProductPagina.php?id=$id'>" ;
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

            if ( strlen($row["Productnaam"]) < 22 )
            {
                echo "<br>";
            }
            
            if( $row['Aanbieding'] == 0)    // Geen aanbieding
            {   
                echo "<br>";
                echo '<span class="prijstekst">&euro;' . trimLeadingZeroes($row["Prijs"]) . '</span>';
            }
            else
            {
                echo '<span class="prijstekst" id="afgeprijst">&euro;' . trimLeadingZeroes($row["Prijs"]) . '</span>';
                echo '<br><span class="afgeprijst">&euro;' . trimLeadingZeroes($row["Aanbieding"]) . ' </span>';
            }
    
            echo "<br>";
            echo "</a>";    
        }
    fclose($f); 
    }
?>