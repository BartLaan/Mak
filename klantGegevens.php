<!DOCTYPE html>
<html>
<head>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
	<link href="klantenBeheren.css" rel="stylesheet" type="text/css" />
    <title>Klantgegevens - Barry's Bakery</title>
</head>
<body>

<?php include 'menu.php' ?>

<div id='page'>
<div id='text'>
<?php
if (!isset($_GET['id'])) {
    echo "Geen gebruiker gespecificeerd.";
} else {
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
        $stmt = $db->prepare("SELECT Voornaam, Achternaam, Tussenvoegsel, Emailadres, Telefoonnummer, Straat, Postcode, Woonplaats, Huisnummer, Geslacht FROM Klant WHERE Klant_ID='". $_GET['id'] ."'");
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            echo '
                <a href="klantenBeheren.php"><img src="images/terugnaarklantenoverzicht.png" onmouseover="this.src=\'images/terugnaarklantenoverzichthover.png\'" onmouseout="this.src=\'images/terugnaarklantenoverzicht.png\'" alt="terugnaarklantenoverzicht" height="40"></a>
                <h1>Klantgegevens van '. $result['Voornaam'] .' '. $result['Tussenvoegsel']  .' '. $result['Achternaam'] .':</h1>
                <table>
                    <tr>
                        <td style="font-weight:bold">Klantnummer</td>
                        <td>'. $_GET['id'] .'</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Naam</td>
                        <td>'. $result['Achternaam'] .', '. $result['Voornaam'] .' '. $result['Tussenvoegsel'] .'<td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Emailadres</td>
                        <td>'. $result['Emailadres'] .'<td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Tel. nummer</td>
                        <td>'. $result['Telefoonnummer'] .'<td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Adres</td>
                        <td>'. $result['Straat'] . ' '. $result['Huisnummer'] .'<br />'. $result['Postcode'] .'<br />'. $result['Woonplaats'] .'<td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Geslacht</td>';
                        if ($result['Geslacht'] == 1) {
                            echo '<td>M</td>';
                        } elseif ($result['Geslacht'] == 2) {
                            echo '<td>V</td>';
                        } else {
                            echo '<td>?</td>';
                        }
            echo '</tr>
                </table>
            ';
        } else {
            echo "</table><h1>Er is geen klant met dit klantnummer.</h1>";
        }
    } elseif (isset($_SESSION['Klant_ID']) ) {
        echo "U bent niet gemachtigd om deze pagina te bekijken.";
    }
}
?>
            
</div>
</div>
</body>
</html>