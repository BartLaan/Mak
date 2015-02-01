<!DOCTYPE html>
<html>
<head>
    <title>Productgegevens - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
    <link href="klantenBeheren.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php include 'menu.php' ?>


<div id='page'>
<div id='text'>
<?php
# functie voor de overbodige nullen includen
include 'TrimLeadingZeroes.php';

# check of er een id meegegeven wordt
if (!isset($_GET['id'])) {
    echo "Geen factuur gespecificeerd.";
} else {
    # check of de administrator ingelogd is
    if (isset($_SESSION['Klant_ID'])) {
        $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $admin = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form action="log_in.php" method="POST">
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if (isset($_SESSION['Klant_ID']) && $admin && strlen($admin["Emailadres"]) > "0") {
        $informatijRijIterator = 0;
    
        
        $klantInfoQuery = 'SELECT Voornaam, Achternaam, Straat, Huisnummer, Postcode, Woonplaats, Telefoonnummer, Emailadres from Klant WHERE Klant_ID = ' . $_SESSION["Klant_ID"] . ';';
        $stmt = $db->prepare($klantInfoQuery);
        $stmt->execute();
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($resultArray as $results)
        {
            foreach($results as $key => $value)
            {
                $informatieRijSoort = ($informatijRijIterator % 2) + 1;
                if($key == "Voornaam")
                {
                    echo '<div class="informatieRij' . $informatieRijSoort . '">';
                        echo '<div class="informatieVeld">';
                            echo '<input id="' . $key . '"   onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value .'">';
                        echo '</div>';
                        echo '<div class="informatieVeld">';
                            echo '<input id="Achternaam" onfocus="processInput(this)" onfocusout="validateInput(this)" type="text" style="display:inline-block; margin-left:3%" value="' . $results["Achternaam"] .'">';
                        echo '</div>';
                        echo '<div class="inputValidateBox">';
                            echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';

                }

                else if($key == "Achternaam")
                {
                    continue;
                }

                else if($key == "Huisnummer")
                {
                    continue;
                }

                else if($key == "Straat")
                {
                    echo '<div class="informatieRij' . $informatieRijSoort .'">';
                        echo '<div class="informatieVeld">';
                            echo '<input  id="Straat" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value . '">';
                            echo '</div>';
                            echo '<div class="informatieVeld">';
                                echo '<input id="Huisnummer" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" style="display:inline-block; margin-left:3%" value= "' . $results["Huisnummer"] . '">';
                            echo '</div>';
                            echo '<div class="inputValidateBox">';
                                echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                            echo '</div>';
                        echo '</div>';

                }
                
                else if( $key == "Telefoonnummer" && ($value == "" || strlen(preg_replace('/\s+/', '', $value)) < 1))
                {
                    echo '<div class="informatieRij' . $informatieRijSoort . '">';
                        echo '<div class="informatieVeld">';
                            echo '<input id="Telefoonnummer" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="[geen telefoonnummer ingevoerd]">';
                        echo '</div>';
                        echo '<div class="inputValidateBox">';
                            echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';
                }

                else
                {
                    echo '<div class="informatieRij' . $informatieRijSoort . '">';
                        echo '<div class="informatieVeld">';
                            echo '<input id="' . $key . '" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value . '">';
                        echo '</div>';
                        echo '<div class="inputValidateBox">';
                            echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';
                }
                $informatijRijIterator++;
            }
    
        }
    } elseif (isset($_SESSION['Klant_ID']) ) {
        echo "U bent niet gemachtigd om deze pagina te bekijken.";
    }
}
?>
            
</div>
</div>

<script type="text/javascript" src="productAanpassen.js"></script>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>