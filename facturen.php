<!DOCTYPE html>
<html>
<head>
	<title>Facturen - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
	<link href="klantenBeheren.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php include 'menu.php' ?>

<div id='page'>
<div id='text'>
<?php
	# Factuurnummer, datum, Klantnummer (met link naar klantGegevens.php?id=*klantnummer*), producten, verzendmethode, bedrag
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
    	echo '
			<h1>Facturen</h1>

			<table>
				<tr>
					<th>Factuurnummer</th>
					<th>Naam</th>
					<th>Emailadres</th>
				</tr>
		';
		$stmt = $db->prepare("SELECT Klant_ID, Achternaam, Voornaam, Tussenvoegsel, Emailadres FROM Klant ORDER BY Emailadres");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $klant) {
			$klantLink = "<a href='klantGegevens.php?id='". $klant['Klant_ID'] ."'>";
			echo '<tr>
				<td>'. $klantLink . $klant['Klant_ID'] .'</a></td>
				<td>'. $klantLink . $klant['Achternaam'] .', '. $klant['Voornaam'] .' '. $klant['Tussenvoegsel'] .'</a></td>
				<td>'. $klantLink . $klant['Emailadres'] .'</a></td>
			</tr>
			';
		}
		echo "</table>";
	} else {
		echo "U bent niet gemachtigd om deze pagina te bekijken.";
	}
?>
			
</div>
</div>
</body>
</html>