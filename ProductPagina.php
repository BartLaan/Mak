<!DOCTYPE html>

<html>

<head>

    <title>Product bekijken - Barry's Bakery </title>
    <link rel="stylesheet" type="text/css" >
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
    <link href="opmaak.css" rel="stylesheet" type="text/css" /> 
    <link href="productpagina.css" rel="stylesheet" type="text/css" /> 

    <script language="javascript">
        function bigImg(x) {
            x.style.width = "500px";
        }
        function normalImg(x) { 
            x.style.width = "200px"
        }
    </script>

</head>

<body> 
    <!-- include menu header -->
    <?php include 'menu.php'; ?>


    <div id="page">
        <div id="text">
            <?php     
                # product_id ophalen vanuit de productcatalogus      
                if(!empty($_GET["id"])) {
                    $Product_Nr = $_GET["id"];
                
                    # als er een recensie is geplaatst de naam ophalen
                    if (!empty($_POST["naam"])) {
                        $naam = $_POST["naam"];
                    }

                    # als er een recensie is geplaatst de sterren ophalen
                    if (!empty($_POST["sterren"])) {
                        $sterren = $_POST["sterren"];
                    }

                    # als er een recensie is geplaatst de naam ophalen
                    if (!empty($_POST["comment"])) {
                        $recensie = $_POST["comment"];
                    }

                    # als er een recensie geplaatst is, deze toevoegen
                    if(!empty($naam) && !empty($recensie)){
                        # check of gebruiker is ingelogd, zo niet moet ie eerst inloggen
                        if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
                            $add_recensie = "INSERT INTO `Mak`.`Recensies` (`Product_ID`, `Klant_ID`, `Naam`, `Recensie`, `Recensie_Datum`, `Aantal_Sterren`) VALUES ('".$Product_Nr."', '".$_SESSION['Klant_ID']."', '".$naam."', '".$recensie."', '".date("Y-m-d H:i:s")."', '".$sterren."');";
                            $recensie_toevoegen = $db->prepare($add_recensie);
                            $recensie_toevoegen->execute();
                        } else {
                            echo '<p class="center"> U moet ingelogd zijn om recensies te plaatsen. </p>';
                        }
                    }

                    # functie voor de overbodige nullen includen
                    include 'TrimLeadingZeroes.php';

                    # productinformatie ophalen
                    $productenSql = 'SELECT * FROM Product WHERE Product_ID="'.$Product_Nr.'"';
                    $product_ophalen = $db->prepare($productenSql); 
                    $product_ophalen->execute();

                    $result = $product_ophalen->fetchAll(PDO::FETCH_ASSOC);

                    # gegevens van het product printen
                    foreach ($result as $row){

                        echo "<div class='productVak'>
                                <h1 class='left'>".$row['Productnaam']."</h1>";
                            echo '<img onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0" src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '" width="200">';

                            # check op aanbiedingen en trim de prijs
                            $check_aanbieding = false;
                            $prijs = trimLeadingZeroes($row["Prijs"]);

                            if ($row['Aanbieding'] != 00000000.00) {
                                $aanbieding =  trimLeadingZeroes($row['Aanbieding']); 
                                $check_aanbieding = true;
                            }

                            echo "<div class='beschrijvingsVak'>
                                <h3>Beschrijving </h3>
                                <p>".$row['Beschrijving']."</p>";
                                # als er een aanbieding zien, weergeef dit, zo niet laat alleen de prijs zien
                                if ($check_aanbieding == true) {
                                    echo "<p> Prijs: <em> &#128;".$prijs."</em></p>";
                                    echo "<p class='afgeprijst'>  &#128;".$aanbieding." </p>";
                                } else { 
                                    echo "<p> Prijs: &#128; ".$prijs. "</p>";
                                }

                            # toevoegen aan winkelwagen
                            echo '<form action="Winkelwagen.php" method="post">
                                <input type="hidden" value="'.$Product_Nr.'" name="winkelwagen">
                                <input type="image" src="images/inwinkelwagen.png" onmouseover="this.src=\'images/inwinkelwagenhover.png\'" onmouseout="this.src=\'images/inwinkelwagen.png\'" alt="inwinkelwagen" height="40" /></form>';
                            echo "</div>

                            </div>";
                
                        echo "<hr>";
                
                        echo "<div class='informatieVak'>
                
                            <div class='tekstVak'>
                                <h3>Specificaties</h3>
                                <p> Gewicht: <b>".$row['Gewicht']."</b> gram</p>
                                <p> Extra informatie: <b>".$row['SecundaireInfo']."</b></p>
                            </div>
                            <hr>";
                
                            echo "<div class='tekstVak'>
                                <h3> Recencies</h3>";
                            # recensies ophalen
                            $recensieSql = 'SELECT Naam, Recensie_Datum, Aantal_Sterren, Recensie FROM Recensies WHERE Product_ID="'.$Product_Nr.'"';
                            $stamt = $db->prepare($recensieSql);
                            $stamt->execute();

                            $result = $stamt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row){
                                # recensies printen
                                echo "<h4 class='name'>".$row['Naam']."</h4>
                                    <h5 class='name'>".$row['Recensie_Datum']."</h5>";
                                    for ($i = 0; $i < $row['Aantal_Sterren']; $i++) {
                                        echo '<img src="images/sterretje.png" alt="sterretje" width="15">';
                                    }  
                                echo "    <p>".$row['Recensie']."</p>
                                <hr>";

                
                            }
                            echo '</div>';

                            # recensies toevoegen
                            echo "<form action='".htmlspecialchars("ProductPagina.php?id=$Product_Nr")."' method='POST'> 
                                <h4 class='tekstKop'>Naam</h4>
                                <input type='text' name='naam'>
                                <h4 class='tekstKop'>Aantal sterren </h4>
                                <select name = 'sterren'>
                                        <option value = '0'> 0 </option>
                                        <option value = '1'> 1 </option>
                                        <option value = '2'> 2 </option>
                                        <option value = '3'> 3 </option>
                                        <option value = '4'> 4 </option>
                                        <option value = '5'> 5 </option>
                                </select> 
                                <h4 class='tekstKop'>Recensie</h4>
                                <textarea style='' float:none;' name='comment' cols='50' rows='10'></textarea> <br>
                                <input style='margin-top:10px' type='submit' value='Recensie plaatsen'/>
                            </form>";
                        
                        echo "</div>
                        </div>";
                    }
                } else {
                    # als er een id wordt gegeven dat niet in de database zit, geef een melding dat deze pagina niet bestaat
                    echo "<br> <p class='center'> Deze pagina bestaat niet. Klik <a href='productCatalogus.php'>hier</a> om terug te gaan naar het overzicht.</p>";
                }
            ?>
            
        </div>
    </div>
    <!-- include footer -->
    <?php include 'footer.php'; ?>

</body>

</html>