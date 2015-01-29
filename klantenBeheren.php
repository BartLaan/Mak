<!DOCTYPE html>
<html>
<head>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
	<link href="klantenBeheren.css" rel="stylesheet" type="text/css" />
	<title>Klanten beheren - Barry's Bakery</title>
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
        $admin = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form action="log_in.php" method="POST">
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if (isset($_SESSION['Klant_ID'] && $admin && strlen($result["admin"]) > "0") {
    	echo '
			<h1>Klanten</h1>

			<table>
				<tr>
					<th>Klantnummer</th>
					<th>Naam</th>
					<th>Emailadres</th>
				</tr>
		';
		$stmt = $db->prepare("SELECT Klant_ID, Achternaam, Voornaam, Tussenvoegsel, Emailadres FROM Klant ORDER BY Emailadres");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $klant) {
			$klantLink = '<a href="klantGegevens.php?id='.$klant["Klant_ID"].'">';
			echo '
				<td>'. $klantLink . $klant['Klant_ID'] .'</a></td>
				<td>'. $klantLink . $klant['Achternaam'] .', '. $klant['Voornaam'] .' '. $klant['Tussenvoegsel'] .'</a></td>
				<td>'. $klantLink . $klant['Emailadres'] .'</a></td>
				<td>'. $klantLink .'<button>Details</button></a></td>
			</tr>
			';
		}
		echo "</table>";
    } elseif (isset($_SESSION['Klant_ID']) ) {
		echo "U bent niet gemachtigd om deze pagina te bekijken.";
	}
?>
			
</div>
</div>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>