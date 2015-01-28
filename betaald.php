<!DOCTYPE html>

<html>
    <head>
        <title>
            Verzonden
        </title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
        <link href="opmaak.css" rel="stylesheet" type="text/css" />

    </head>


    <body>
        <!--<?php include 'menu.php'; ?>-->
        <div id="page">
            <div id="text">
                <?php 
                    if (!empty($_SESSION['winkelwagen'])){ 
                        $subtotaal = 0.00;

                        include 'database_connect.php';
                        #include 'TrimLeadingZeroes.php';
                        $datum = date("Y-m-d H:i:s");
                        $datum = "2015-01-27 18:15:54";
                        /*$add_bestelling = 'INSERT INTO Bestelling (Klant_ID, Bestelling_Datum) VALUES (?, ?)';
                        $stmt = $db->prepare($add_bestelling);
                        $stmt->bindValue(1, $_SESSION['Klant_ID'], PDO::PARAM_INT); 
                        $stmt->bindValue(2, $datum, PDO::PARAM_STR);
                        $stmt->execute(); */

                        $Klant_ID = $_SESSION['Klant_ID'];

                        echo $Klant_ID;
                        $get_bestel_id = 'SELECT Bestelling_ID FROM Bestelling WHERE Klant_ID=:Klant_ID  AND Bestelling_Datum=:datum';
                        $stamt = $db->prepare($get_bestel_id);
                        $stamt->bindParam(':Klant_ID', $Klant_ID);
                        $stamt->bindParam(':datum', $datum);
                        $stamt->execute(); 

                        $result = $stamt->fetchAll(PDO::FETCH_ASSOC);

                        print_r($result);

                            $verzending = 0.00;
                        if (!empty($_SESSION['verzending'])) {
                            $_SESSION['verzending'] = $_POST['verzending'];
                            if ($_SESSION['verzending'] == "verzenden") {
                                $verzending = 6.95;
                            } else {
                                $verzending = 0.00;
                            }
                        } 
                        
                        echo '<p class="center"> U hebt betaald! Bedankt voor uw bestelling! </p>
                        <div class="betaald"> <img src="images/barry_banner.jpg" alt="Barrys Bakery Banner" style="width: 700px"> </div>';

                        echo '<table class="center">

                        <tr>
                            <th>Aantal</th>
                            <th></th>
                            <th>Artikel</th>
                            <th>Voorraad</th>
                            <th>Prijs</th>

                        </tr>';

                        foreach ($result as $row){

                            echo $row['Bestelling_ID'];
                            $Bestelling_ID = $row['Bestelling_ID'];
                        }

                        foreach ($_SESSION['winkelwagen'] as $value) {
                            $query = 'SELECT Product_ID, Productnaam, Prijs, Voorraad, img_filepath, Aanbieding FROM Product WHERE Product_ID=?';
                            $statemt = $db->prepare($query);
                            $statemt->bindValue(1, $value, PDO::PARAM_INT); 
                            $statemt->execute();

                            $results = $statemt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($results as $row){

                                if (isset($_SESSION['aantalproducten'] [$row['Product_ID']])) {
                                        $aantal = $_SESSION['aantalproducten'] [$row['Product_ID']];
                                } else {
                                    $aantal = 1;
                                }


                                if ($row['Aanbieding'] == 00000000.00) {
                                    $prijs = $aantal * $row["Prijs"] ;
                                } else {
                                    $prijs =  $aantal * $row['Aanbieding']; 
                                }


                                $goede_prijs = number_format("$prijs", 2);
                                $subtotaal = $subtotaal + $goede_prijs;
                                $goede_subtotaal = number_format("$subtotaal", 2);
                                $totaal = $subtotaal + $verzending;
                                $goede_totaal = number_format("$totaal", 2);

                                echo ' <tr>
                                        <td >'.$aantal.'
                                        </td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $row["Product_ID"] . '"> <img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"></img></a></td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $row["Product_ID"] . '">' . $row["Productnaam"] . '</a></td>
                                        <td><p> &#128; '.trimLeadingZeroes($goede_prijs). '</p>';
                                        if ($voorraad == "nietvoorraad") {
                                            echo ' <td> Dit product is momenteel niet op voorraad, dus houd alstublieft rekening met een paar extra dagen bezorgtijd. We sturen Barry nu naar de keuken!</td>';
                                        }
                                    echo '</tr>';
                            }
                        }                

                        echo '</table> ';

                        /*echo '<div class="updateKnop">
                            <a href="#" class="button1">Update winkelwagen</a>
                            </div>';*/

                        /*$exBTW = trimLeadingZeroes(($totaal/121)*100);
                        echo '<div class="underTable">
                            <div class="bestellingsInformatie">
                                <p>Subtotaal: &#8364 '.trimLeadingZeroes($goede_subtotaal).'</p> ';?>

                                    <form action="Winkelwagen.php" method="POST">
                                    <p>Verzending:
                                    <select name="verzending">
                                        <option value="verzenden" <?php if ($verzending == 6.95) {echo 'selected = "selected"';} ?> >
                                            Verzending met PostNL (&#8364 6,95)</option>
                                        <option value="ophalen" <?php if ($verzending== 0.00) {echo 'selected = "selected"';}?> >Ophalen (&#8364 0,00)</option>
                                    </select>
                                        <input type="submit" value="Kies">
                                        
                                    </form></p>
                                <?php
                                    if (!empty($_POST['verzending'])) {
                                        echo '<p style="color:#666666">Totaal Excl. BTW: &#8364 '.number_format("$exBTW", 2).'</p>
                                <p>Totaal Incl. BTW: &#8364: '.trimLeadingZeroes($goede_totaal).'</p>';

                                        if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
                                            echo "<a href='betaald.php'><img src='images/afrekenen.png' alt='afrekenen' onmouseover='this.src=\"images/afrekenenhover.png\"' onmouseout='this.src=\"images/afrekenen.png\"' style='height:35px;' ></a>";
                                        } else {
                                            echo '<a href="log_in.php">Afrekenen</a>';
                                        }
                                    } else {
                                        echo 'Kies eerst uw verzendmethode.';
                                    }
                        echo' </div>
                        </div> ';*/
                    } else {
                        echo '<p class="center"> Uw wonkelmandje is leeg, klik <a href="productCatalogus.php">hier</a> om naar het overzicht te gaan </p>';
                    }
                ?>
                
                <p class="center"> <a href="https://ki30.webdb.fnwi.uva.nl/Mak/productCatalogus.php">
                    <img src="images/verderwinkelen.png" onmouseover="this.src='images/verderwinkelenhover.png'" onmouseout="this.src='images/verderwinkelen.png'" alt="verderwinkelen" height="40"/>
                </a> </p>
            </div>
        </div>
        
<?php include 'footer.php'; ?>
    </body>

</html>