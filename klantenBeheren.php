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
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $klant) {
			$klantLink = "<a href='klantGegevens.php?id=". $result['Klant_ID'] .">";
			echo '<tr>
				<td>'.$result['Klant_ID'].'</td>
				<td>'. $klantLink . $result['Klant_ID'] .'</a></td>
				<td>'. $klantLink . $result['Achternaam'] .', '. $result['Voornaam'] .' '. $result['Tussenvoegsel'] .'</a></td>
				<td>'. $klantLink . $result['Emailadres'] .'</a></td>
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