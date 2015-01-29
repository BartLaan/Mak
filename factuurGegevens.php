<!DOCTYPE html>
<html>
<head>
    <title>Factuur bekijken - Barry's Bakery</title>
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
    if (isset($_SESSION['Klant_ID'] && $admin && strlen($result["admin"]) > "0") {
        # haal de gegevens van de factuur op
        $factuur_gegevens = $db->prepare("SELECT * FROM Factuur WHERE Factuur_ID='".$_GET['id']."'");
        $factuur_gegevens->execute();
        $result = $factuur_gegevens->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $factuur) {
            echo '
            <a href="facturen.php"><img src="images/terugnaarfactuuroverzicht.png" onmouseover="this.src=\'images/terugnaarfactuuroverzichthover.png\'" onmouseout="this.src=\'images/terugnaarfactuuroverzichthover.png\'" alt="terugnaarfactuuroverzicht" height="40"></a>
            <h1>Factuurgegevens van factuurnummer '. $factuur['Factuur_ID'] .':</h1>
            <table>
            <tr>
                        <td style="font-weight:bold">Factuurnummer</td>
                        <td>'. $_GET['id'] .'</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Klantnummer</td>
                        <td><a href="klantGegevens.php?id='.$factuur["Klant_ID"].'">'. $factuur['Klant_ID'] .'</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Datum</td>
                        <td>'. $factuur['Factuur_Datum'] .'</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Verzendmethode</td>
                        <td>'. $factuur['Verzendmethode'] .'</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Totaalprijs</td>
                        <td> &#8364 '. $factuur['Totaalprijs'] .'</td>
                    </tr>';
        }

        if (!$result) {
            echo "</table><h1>Er is geen factuur met dit factuurnummer.</h1>";
        }

        # haal de product van het factuur op
        $stmt = $db->prepare("SELECT  Product_Factuur_Doorverwijzing.Aantal, Factuur_Product.Productnaam, Factuur_Product.Prijs FROM Product_Factuur_Doorverwijzing INNER JOIN Factuur_Product ON Product_Factuur_Doorverwijzing.Factuur_Product_ID = Factuur_Product.Factuur_Product_ID WHERE Product_Factuur_Doorverwijzing.Factuur_ID ='".$_GET['id']."'");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $factuur) {
            echo '
                    
                    <tr>
                        <td style="font-weight:bold">Producten</td>
                        <td>Naam: '. $factuur['Productnaam'] . '<br/>
                         Aantal: '. $factuur['Aantal'] .'<br />
                         Prijs: &#8364 '. trimLeadingZeroes($factuur['Prijs']) .'<br /><td>
                    </tr>';
        }  

           echo ' </table>';
<<<<<<< HEAD
    } else {
=======
        if (!$result) {
            echo "</table><h1>Er is geen klant met dit klantnummer.</h1>";
        }
    } elseif (isset($_SESSION['Klant_ID']) ) {
>>>>>>> 24081f6d6176232f67aaa547c8c85872e95d48a9
        echo "U bent niet gemachtigd om deze pagina te bekijken.";
    }
}
?>
            
</div>
</div>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>