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
<h1>Klanten</h1>

<table>
	<tr>
		<th>Klant_ID</th>
		<th>Naam</th>
		<th>Emailadres</th>
	</tr>
<?php
	$stmt = $db->prepare("SELECT Klant_ID, Achternaam, Voornaam, Tussenvoegsel, Emailadres FROM Klant ORDER BY Emailadres");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $klant) {
		$klantLink = "<a href='klantGegevens.php?id=". $klant['Klant_ID'] .">";
		echo '<tr>
			<td>'. $klantLink . $klant['Klant_ID'] .'</a></td>
			<td>'. $klantLink . $klant['Achternaam'] .', '. $klant['Voornaam'] .' '. $klant['Tussenvoegsel'] .'</a></td>
			<td>'. $klantLink . $klant['Emailadres'] .'</a></td>
		</tr>
		';
	}
?>
</table>
</div>
</div>
</body>
</html>