<!DOCTYPE html>
<html>
<head>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php include 'menu.php' ?>

<table>
	<tr>
		<th>Klant_ID</th>
		<th>Naam</th>
		<th>Emailadres</th>
	</tr>
<?php
	$stmt = $db->prepare("SELECT Klant_ID, Achternaam, Voornaam, Tussenvoegsel, Emailadres FROM Klant ORDER BY Emailadres");
	$stmt->execute();
	$result = fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $klant) {
		echo '<tr><a href="klantGegevens.php?id='. $klant['Klant_ID'] .'">
			<td>'. $klant['Klant_ID'] .'</td>
			<td>'. $klant['Achternaam'] .', '. $klant['Voornaam'] .' '. $klant['Tussenvoegsel'] .'</td>
			<td>'. $klant['Emailadres'] .'</td>
		</a></tr>
		';
	}
?>
</body>
</html>