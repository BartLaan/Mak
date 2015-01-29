<!DOCTYPE html>

<html>
    <head>
        <title>
            Verzonden
        </title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
        <link href="opmaak.css" rel="stylesheet" type="text/css" />
        <link href="winkelwagen.css" rel="stylesheet" type="text/css" />

    </head>


    <body>
        <!-- include menu header -->
        <?php include 'menu.php'; ?>
        <div id="page">
            <div id="text">
                <?php 
                    # check of winkelwagen niet leeg is en of je van winkelwagenpagina komt (en dus niet random url intypt)
                    if (!empty($_SESSION['winkelwagen']) && !empty($_POST['betaald'])){ 

                        # functie voor de overbodige nullen includen
                        include 'TrimLeadingZeroes.php';

                        $subtotaal = 0.00;
                        $datum = date("Y-m-d H:i:s");
                        $Klant_ID = $_SESSION['Klant_ID'];

                        # bestelling toevoegen
                        $bestelling_toevoegen = "INSERT INTO `Mak`.`Bestelling` (`Klant_ID`, `Bestelling_Datum`) VALUES ('".$Klant_ID."', '".$datum."');";
                        $b_toevoegen = $db->prepare($bestelling_toevoegen);
                        $b_toevoegen->execute(); 

                        # bestelling_id van de net toegevoegde bestelling ophalen
                        $bestel_id_ophalen = "SELECT Bestelling_ID FROM Bestelling WHERE Klant_ID='".$Klant_ID."' AND Bestelling_Datum='".$datum."'"; 
                        $b_id = $db->prepare($bestel_id_ophalen);
                        $b_id->execute(); 

                        $result = $b_id->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row){

                            $Bestelling_ID = $row['Bestelling_ID'];
                        }

                        # verzendingsprijs bepalen
                        $verzending = 0.00;
                        if (!empty($_SESSION['verzending'])) {
                            $verzendmethode = $_SESSION['verzending'];
                            if ($_SESSION['verzending'] == "verzenden") {
                                $verzending = 6.95;
                            } else {
                                $verzending = 0.00;
                            }
                        } 
                    
                        echo '<p class="center"> U hebt betaald! Bedankt voor uw bestelling! </p>
                        <div class="betaald"> <img src="images/barry_banner.jpg" alt="Barrys Bakery Banner" style="width: 700px"> </div>';

                        # table head printen
                        echo '<table class="winkelwagen">

                        <tr>
                            <th>Aantal</th>
                            <th></th>
                            <th>Artikel</th>
                            <th>Prijs</th>

                        </tr>';

                        # producten uit de winkelwagen ophalen
                        foreach ($_SESSION['winkelwagen'] as $value) {
                            # value is nu product_id dus de gegevens van dat product ophalen
                            $product_ophalen = 'SELECT Product_ID, Productnaam, Categorie, Prijs, Voorraad, img_filepath, Aanbieding FROM Product WHERE Product_ID="'.$value.'"';
                            $p_ophalen = $db->prepare($product_ophalen);
                            $p_ophalen->execute();

                            $results = $p_ophalen->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($results as $row){
                                # check de voorraad
                                if ($row['Voorraad'] > 0) {
                                    $voorraad = "voorraad";
                                } else {
                                    $voorraad = "nietvoorraad";
                                }

                                # check het aantal
                                if (isset($_SESSION['aantalproducten'] [$row['Product_ID']])) {
                                        $aantal = $_SESSION['aantalproducten'] [$row['Product_ID']];
                                } else {
                                    $aantal = 1;
                                }

                                # check de aanbieding
                                if ($row['Aanbieding'] == 00000000.00) {
                                    $productprijs = $row["Prijs"];
                                    $prijs = $aantal * $row["Prijs"] ;
                                } else {
                                    $productprijs = $row["Aanbieding"];
                                    $prijs =  $aantal * $row['Aanbieding']; 
                                }

                                # koppel aan variabelen
                                $Product_ID = $row['Product_ID'];
                                $Productnaam = $row['Productnaam'];
                                $Categorie = $row['Categorie'];
                                $img_filepath = $row['img_filepath'];

                                # subtotaal en totaal berekenen en alle prijzen afronden op twee decimalen
                                $goede_prijs = number_format("$prijs", 2);
                                $subtotaal = $subtotaal + $goede_prijs;
                                $goede_subtotaal = number_format("$subtotaal", 2);
                                $totaal = $subtotaal + $verzending;
                                $goede_totaal = number_format("$totaal", 2);

                                # producten in de table printen
                                echo ' <tr>
                                        <td >'.$aantal.'
                                        </td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $Product_ID. '"> <img src="images/' . $img_filepath . '" alt="' . $Productnaam. '"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"></img></a></td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $Product_ID . '">' . $Productnaam . '</a></td>
                                        <td><p> &#128; '.trimLeadingZeroes($goede_prijs). '</p>';
                                        if ($voorraad == "nietvoorraad") {
                                            echo ' <td> Dit product is momenteel niet op voorraad, dus houd alstublieft rekening met een paar extra dagen bezorgtijd. We sturen Barry nu naar de keuken!</td>';
                                        }
                                    echo '</tr>';

                            # product toevoegen aan de product_bestelling_doorverwijzing                                    
                            $product_bestelling_toevoegen = "INSERT INTO `Mak`.`Product_Bestelling_Doorverwijzing` (`Product_ID`, `Bestelling_ID`, `Aantal`) VALUES ('".$Product_ID."', '".$Bestelling_ID."', '".$aantal."');";
                            $p_b_toevoegen = $db->prepare($product_bestelling_toevoegen);    
                            $p_b_toevoegen->execute(); 

                            # factuur toevoegen 
                            $factuur_toevoegen = "INSERT INTO `Mak`.`Factuur` (`Factuur_ID`, `Klant_ID`, `Totaalprijs`, `Verzendmethode`, `Factuur_Datum`) VALUES (NULL, '".$Klant_ID."', '".$goede_totaal."', '".$verzendmethode."', '".$datum."');";
                            $f_toevoegen = $db->prepare($factuur_toevoegen);
                            $f_toevoegen->execute(); 

                            # factuur_id ophalen
                            $factuur_id_ophalen = 'SELECT Factuur_ID FROM Factuur WHERE Klant_ID="'.$Klant_ID.'"';
                            $f_id_ophalen = $db->prepare($factuur_id_ophalen);
                            $f_id_ophalen->execute();

                            $resultss = $f_id_ophalen->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($resultss as $row){
                                $Factuur_ID = $row['Factuur_ID'];
                            }

                            # product toevoegen aan factuur_product
                            $factuur_product_toevoegen = "INSERT INTO `Mak`.`Factuur_Product` (`Factuur_Product_ID`, `Productnaam`, `Categorie`, `Prijs`, `img_filepath`, `Toevoegingsdatum`) VALUES (NULL, '".$Productnaam."', '".$Categorie."', '".$productprijs."', '".$img_filepath."', '".$datum."');";
                            $p_f_toevoegen = $db->prepare($factuur_product_toevoegen);
                            $p_f_toevoegen->execute(); 

                            # factuur_product_id ophalen
                            $factuur_product_id_ophalen = 'SELECT Factuur_Product_ID FROM Factuur_Product WHERE Productnaam="'.$Productnaam.'" AND Toevoegingsdatum="'.$datum.'"';
                            $f_p_ophalen = $db->prepare($factuur_product_id_ophalen);
                            $f_p_ophalen->execute();


                            $resultsss = $f_p_ophalen->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($resultsss as $row){
                                $Factuur_Product_ID = $row['Factuur_Product_ID'];
                            }

                            # product toevoegen aan de product_factuur_doorverwijzing
                            $product_factuur_doorverwijzing_toevoegen = "INSERT INTO `Mak`.`Product_Factuur_Doorverwijzing` (`Factuur_Product_ID`, `Factuur_ID`, `Aantal`) VALUES ('".$Factuur_Product_ID."', '".$Factuur_ID."', '".$aantal."');";                            
                            $p_f_d_toeveogen = $db->prepare($product_factuur_doorverwijzing_toevoegen);     
                            $p_f_d_toeveogen->execute();

                            }
                        }                

                        echo '</table> ';

                        # voeg de totaalprijs en de verzendmethode toe aan de bestelling
                        $update_bestelling = 'UPDATE Bestelling SET Totaalprijs="'.$goede_totaal.'", Verzendmethode="'.$verzendmethode.'" WHERE Bestelling_ID="'.$Bestelling_ID.'"' ;
                        $st = $db->prepare($update_bestelling);
                        $st->execute(); 

                        # print de prijzen exBTW en incBTW en verzendmethode
                        $exBTW = trimLeadingZeroes(($totaal/121)*100);
                        echo '<div class="underTable">
                            <div class="bestellingsInformatie">
                                <p>Subtotaal: &#8364 '.trimLeadingZeroes($goede_subtotaal).'</p> 
                                <p>Verzending: '; 
                                            if ($verzending == 6.95) {
                                                echo 'Verzending met PostNL (&#8364 6,95)';
                                            } else { 
                                                echo 'Ophalen (&#8364 0,00)'; 
                                            }
                            echo '</p>
                                <p style="color:#666666">Totaal Excl. BTW: &#8364 '.number_format("$exBTW", 2).'</p>
                                <p>Totaal Incl. BTW: &#8364: '.trimLeadingZeroes($goede_totaal).'</p>
                            </div>
                        </div> ';
                        # leeg het winkelmandje
                        unset($_SESSION['winkelwagen']);
                        unset($_SESSION['aantalproducten']);
                        unset($_SESSION['verzending']);
                    } else {
                        echo '<p class="center"> Deze pagina is momenteel niet beschikbaar. </p>';
                    }

                ?>
                
                <p class="center"> <a href="https://ki30.webdb.fnwi.uva.nl/Mak/productCatalogus.php">
                    <img src="images/verderwinkelen.png" onmouseover="this.src='images/verderwinkelenhover.png'" onmouseout="this.src='images/verderwinkelen.png'" alt="verderwinkelen" height="40"/>
                </a> </p>
            </div>
        </div>
        
        <!-- include footer -->
        <?php include 'footer.php'; ?>
    </body>

</html>