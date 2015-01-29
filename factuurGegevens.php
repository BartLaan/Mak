<!DOCTYPE html>
<html>
<head>
    <title>Factuur Gegevens - Barry's Bakery</title>
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
if (!isset($_GET['id'])) {
    echo "Geen factuur gespecificeerd.";
} else {
    if (isset($_SESSION['Klant_ID'])) {
        $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form>
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if ($result && strlen($result["Emailadres"]) > "0") {
        # Factuurnummer, datum, Klantnummer (met link naar klantGegevens.php?id=*klantnummer*), producten, verzendmethode, bedrag
        $factuur_gegevens = $db->prepare("SELECT * FROM Factuur WHERE Factuur_ID='".$_GET['id']."'");
        $factuur_gegevens->execute();
        $result = $factuur_gegevens->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $factuur) {
            echo ' <h1>Factuurgegevens van factuurnummer '. $factuur['Factuur_ID'] .' van klantnummer  '. $factuur['Klant_ID']  .':</h1>
            <table>
            <tr>
                        <td style="font-weight:bold">Factuurnummer</td>
                        <td>'. $_GET['id'] .'</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Klantnummer</td>
                        <td>'. $factuur['Klant_ID'] .'</td>
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
                        <td>'. $factuur['Totaalprijs'] .'</td>
                    </tr>
                                ';
        }

        $stmt = $db->prepare("SELECT  Product_Factuur_Doorverwijzing.Aantal, Factuur_Product.Productnaam, Factuur_Product.Prijs FROM Product_Factuur_Doorverwijzing INNER JOIN Factuur_Product ON Product_Factuur_Doorverwijzing.Factuur_Product_ID = Factuur_Product.Factuur_Product_ID WHERE Product_Factuur_Doorverwijzing.Factuur_ID ='".$_GET['id']."'");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        foreach ($result as $factuur) {
            echo '
                    
                    <tr>
                        <td style="font-weight:bold">Producten</td>
                        <td>Naam: '. $factuur['Productnaam'] . '<br/>
                         Aantal: '. $factuur['Aantal'] .'<br />
                         Prijs: '. trimLeadingZeroes($factuur['Prijs']) .'<br /><td>
                    </tr>';
                    
            echo '
            ';
        }  

           echo ' </table>';
        /*else {
            echo "</table><h1>Er is geen klant met dit klantnummer.</h1>";
        }*/
    } else {
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