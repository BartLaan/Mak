<!DOCTYPE html>
<html>
<head>
    <title>Winkelwagen - Barry's Bakery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css-button.css" type="text/css" />
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
    <link href="opmaak.css" rel="stylesheet" type="text/css" />
    <link href="winkelwagen.css" rel="stylesheet" type="text/css" />
     
</head>

<body>
    <!-- include menu header -->
    <?php include 'menu.php'; ?>
        <div id="page">
           <div id="text">
                <h1>Winkelwagen</h1>
                <?php
                    # check of er een product wordt toegevoegd aan de winkelwagen
                    if (!empty($_POST['winkelwagen'])) {  
                        # als winkelwagen niet leeg is check of er geen dubbele zijn 
                        if (!empty($_SESSION['winkelwagen'])){
                            $key = array_search($_POST['winkelwagen'], $_SESSION['winkelwagen']);
                            if ($key===false) {
                                $_SESSION['winkelwagen'] [] = $_POST['winkelwagen'];  
                            }
                        # als winkelwagen leeg is, voeg het gelijk toe
                        } else {
                            $_SESSION['winkelwagen'] [] = $_POST['winkelwagen'];
                        }
                    }

                    # check of er een product verwijdert moet worden (kan mooier met javascript!)
                    if (!empty($_POST['delete'])) {
                        $key = array_search($_POST['delete'], $_SESSION['winkelwagen']);
                        if ($key!==false) {
                            unset($_SESSION['winkelwagen'][$key]);
                        }
                    }

                    # check of het aantal producten is aangepast (kan mooier met javascript!)
                    if (!empty($_POST['aantal']) && !empty($_POST['id'])) {
                        $_SESSION['aantalproducten'] [$_POST['id']] = $_POST['aantal'];
                    }

                    # check de verzending (kan mooier met javascript!)
                    $verzending = 0.00;
                    if (!empty($_POST['verzending'])) {
                        $_SESSION['verzending'] = $_POST['verzending'];
                        if ($_SESSION['verzending'] == "verzenden") {
                            $verzending = 6.95;
                        } else {
                            $verzending = 0.00;
                        }
                    } 

                    # als de winkelwagen niet leeg is, laat de producten zien
                    if (!empty($_SESSION['winkelwagen'])){ 
                        $subtotaal = 0;
                        # print de tabel head
                        echo '<table class="winkelwagen" id="winkelwagen">

                        <tr>
                            <th>Aantal</th>
                            <th></th>
                            <th>Artikel</th>
                            <th>Voorraad</th>
                            <th>Prijs</th>
                            <th>Verwijder</th>

                        </tr>';

                        # functie voor de overbodige nullen includen
                        include 'TrimLeadingZeroes.php';
                        # haal voor elk product in de winkelwagen de gegevens op
                        foreach ($_SESSION['winkelwagen'] as $value) {
                            echo $value;
                            $value = intval($value, 10);
                            # gegevens product ophalen
                            $product_id_ophalen = 'SELECT Product_ID, Productnaam, Prijs, Voorraad, img_filepath, Aanbieding FROM Product WHERE Product_ID='. $value;
                            $id_ophalen = $db->prepare($product_id_ophalen);
                            $id_ophalen->execute();

                            $result = $id_ophalen->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row){

                                # check het aantal 
                                if (isset($_SESSION['aantalproducten'] [$row['Product_ID']])) {
                                        $aantal = $_SESSION['aantalproducten'] [$row['Product_ID']];
                                } else {
                                    $aantal = 1;
                                }

                                # check de voorraad
                                $nieuwe_aantal = $row['Voorraad'] - $aantal;
                                if ($nieuwe_aantal > 0) {
                                    $voorraad = "voorraad";
                                } else {
                                    $voorraad = "nietvoorraad";
                                }

                                # check de aanbieding
                                if ($row['Aanbieding'] == 00000000.00) {
                                    $prijs = $aantal * $row["Prijs"] ;
                                } else {
                                    $prijs =  $aantal * $row['Aanbieding']; 
                                }

                                # subtotaal en totaal berekenen en alle prijzen afronden op twee decimalen
                                $goede_prijs = number_format("$prijs", 2, ",", ".");
                                $subtotaal = $subtotaal + $prijs;
                                $goede_subtotaal = number_format("$subtotaal", 2, ",", ".");
                                $totaal = $subtotaal + $verzending;
                                $goede_totaal = number_format("$totaal", 2, ",", ".");

                                # print het product in de tabel
                                echo ' <tr>
                                        <td > 
                                            <form action="Winkelwagen.php" method="POST">
                                            <input type="number" name="aantal" min="1" value="'.$aantal.'" class="aantal" onchange="updateTotal(this)" id>
                                            <input type="hidden" name="id" value="'.$row['Product_ID'].'">
                                            <input type="submit" value="Update" id="updateButton">
                                            </form>
                                        </td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $row["Product_ID"] . '"> <img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"></img></a></td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $row["Product_ID"] . '">' . $row["Productnaam"] . '</a></td>
                                        <td><img src="images/'.$voorraad.'.png" alt="'.$voorraad.'" style=" margin-left: 45%; margin-right: 45%; width:20px; height:20px;"> </td>
                                        <td><p> &#128; '.trimLeadingZeroes($goede_prijs). '</p>
                                        <td>
                                            <form action="Winkelwagen.php" method="POST">
                                            <input type="hidden" value="'.$row['Product_ID'].'" name="delete">
                                            <input type="image" src="images/prullenbak.png" alt="Verwijder" width="20" height="20">
                                            </form>
                                        </td>';
                                        # geef een bericht als het niet op voorraad is
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

                        # bereken de prijs exBTW
                        $exBTW = trimLeadingZeroes(($totaal/121)*100);
                        # print de totaalprijs gegevens
                        echo '<div class="underTable">
                            <div class="bestellingsInformatie">
                                <p>Subtotaal: &#8364 '.trimLeadingZeroes($goede_subtotaal).'</p> ';?>

                                    <!-- kies een verzendmethode (kan mooier met javascript!) -->
                                    <form action="Winkelwagen.php" method="POST">
                                    <p>Verzending:
                                    <select onchange="onchange(this)" name="verzending">
                                        <option value="verzenden" <?php if ($verzending == 6.95) {echo 'selected = "selected"';} ?> >
                                            Verzending met PostNL (&#8364 6,95)</option>
                                        <option value="ophalen" <?php if ($verzending== 0.00) {echo 'selected = "selected"';}?> >
                                            Ophalen (&#8364 0,00)</option>
                                    </select>
                                        <input type="submit" value="Kies">
                                        
                                    </form></p>
                                <?php
                                    # als de verzendmethode gekozen is, laat de totaal prijzen zien en het afrekenknopje
                                    if (!empty($_POST['verzending'])) {
                                        echo '<p style="color:#666666">Totaal Excl. BTW: &#8364 '.number_format("$exBTW", 2).'</p>
                                <p>Totaal Incl. BTW: &#8364: '.trimLeadingZeroes($goede_totaal).'</p>';
                                        # als je ingelogd ben, ga verder naar betalen
                                        if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
                                            echo'
                                                <form action="betaald.php" method="POST">
                                                <input type="hidden" name="betaald" value="betaald">
                                                <input type="image" src="images/afrekenen.png" onmouseover="this.src=\'images/afrekenenhover.png\'" onmouseout="this.src=\'images/afrekenen.png\'" alt="verderwinkelen" height="40"/>
                                                </form>';
                                        # als je niet ingelogd ben, ga naar de inlogpagina
                                        } else {
                                            echo '
                                                <form action="log_in.php" method="POST">
                                                <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
                                                <input type="image" src="images/afrekenen.png" onmouseover="this.src=\'images/afrekenenhover.png\'" onmouseout="this.src=\'images/afrekenen.png\'" alt="verderwinkelen" height="40"/>
                                                </form>';
                                        }
                                    # als de verzendmethode niet gekozen is, geef een bericht (je kan nu dus nog niet afrekenen)
                                    } else {
                                        echo 'Kies eerst uw verzendmethode.';
                                    }
                        echo' </div>
                        </div> 

                                <p class="center"> <a href="productCatalogus.php">
                                <img src="images/verderwinkelen.png" onmouseover="this.src=\'images/verderwinkelenhover.png\'" onmouseout="this.src=\'images/verderwinkelen.png\'" alt="verderwinkelen" height="40"/>
                                </a> </p>';
                    } else {
                        echo '<p class="center"> Uw winkelwagen is leeg, klik <a href="productCatalogus.php">hier</a> om naar het overzicht te gaan </p>';
                    }
                ?>
            </div>
        </div>

        <script type="text/javascript"> 

        // document.getElementById("updateButton").style.display = "none";
        var total = <?php echo json_encode($goede_subtotaal); ?>; 

        function updateTotal(caller)
        {
            console.log(caller.tagName);
            if(caller.tagName === "SELECT")
            {
                console.log(caller.value);
            }
            else
            {
                total += caller.value *  getRow(caller)
            }
            
        }

        function getRow(caller)
        {
            var traveler = caller;
            while(traveler.tagName != "TR") 
            {
                traveler = traveler.parentNode;
            }
            return traveler;
        }
        
        function getProductPrijs(row)
        {
            row.cells[getPrijsKolom()];   
        }       

        function getPrijsKolom()
        {
            var kollomen = document.getElementById("winkelwagen").rows[0].cells;
            for(var i = 0; i < kollomen.length; i++)
            {
                if(kollomen.innerText == "Prijs")
                {
                    return i;
                }
            }
        }
        
        </script>


        <noscript>

        </noscript>
        
        <!-- include footer -->
        <?php include 'footer.php'; ?>
    </body>
</html>