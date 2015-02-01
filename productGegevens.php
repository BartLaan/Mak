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
    echo "Geen product gespecificeerd.";
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
    
        
        $productInfoQuery = 'SELECT Productnaam, Categorie, Prijs, Voorraad, Beschrijving, Gewicht, img_filpath, Aanbieding, SecundaireInfo, Toevoegingsdatum FROM Product WHERE Product_ID = ' . $_GET['ID'] . ';';
        $stmt = $db->prepare($productInfoQuery);
        $stmt->execute();
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($resultArray as $results)
        {
            foreach($results as $key => $value)
            {      
                echo '<div class="informatieRij' . $informatieRijSoort . '">';
                    echo '<div class="informatieVeld">';
                        echo '<input id="' . $key . '" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value . '">';
                    echo '</div>';
                    echo '<div class="inputValidateBox">';
                        echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                    echo '</div>';
                echo '</div>';
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