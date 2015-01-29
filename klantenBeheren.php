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
    if (isset($_SESSION['Klant_ID'])) {
        $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<a href="/log_in.php">Inloggen</a>';
    }
    if ($result && strlen($result["Emailadres"]) > "0") {
    	echo '
			<h1>Klanten</h1>

			<table>
				<tr>
					<th>Klantnummer</th>
					<th>Naam</th>
					<th>Emailadres</th>
				</tr>
		';
		$stmt = $db->prepare("SELECT Klant_ID, Achternaam, Voornaam, Tussenvoegsel, Emailadres FROM Klant");
		$stmt->execute();
		

		while ($klant = $stmt->fetchAll(PDO::FETCH_ASSOC);) {
			$klantLink = "<a href='klantGegevens.php?id=". $klant['Klant_ID'] .">";
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