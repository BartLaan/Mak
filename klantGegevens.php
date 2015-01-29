<!DOCTYPE html>
<html>
<head>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
	<link href="klantenBeheren.css" rel="stylesheet" type="text/css" />
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
        $result = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form>
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if ($result && strlen($result["Emailadres"]) > "0") {
        echo '<table>
            <tr>
                <th>Infotype</th>
                <th>Info</th>
            </tr>
        ';
        $stmt = $db->prepare("SELECT Voornaam, Achternaam, Tussenvoegsel, Emailadres, Telefoonnummer, Straat, Postcode, Woonplaats, Huisnummer, Geslacht FROM Klant WHERE Klant_ID='". $_GET['id'] ."'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            echo '
                <tr>
                    <td style="font-weight:bold">Klantnummer</td>
                    <td>'. $result['Klant_ID'] .'</td>
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
                    if ($result['Geslacht'].value == 0) {
                        echo '<td>M</td>';
                    } elseif ($result['Geslacht'].value == 1) {
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
    } else {
        echo "U bent niet gemachtigd om deze pagina te bekijken.";
    }
}
?>
            
</div>
</div>
</body>
</html>