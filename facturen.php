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
        $admin = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form action="log_in.php" method="POST">
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if (isset($_SESSION['Klant_ID']) && $admin && strlen($admin["Emailadres"]) > "0") {
    	echo '
			<h1>Facturen</h1>
			<div align="center">
			<form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
				<input type="text" name="zoek">
				<input type="submit" name="submit">
			</form>
			</div> <br />
			<table>
				<tr>
					<th>Factuurnummer</th>
					<th>Klantnummer</th>
					<th>Datum</th>					
					<th>Totaalprijs</th>
				</tr>
		';
		# Check of gebruiker een zoekopdracht heeft gedaan en constructeer bijbehorende query
		if (isset($_GET['zoek']) && preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) 
		{
			$zoek = $_GET['zoek'];
			$query = "SELECT Factuur_ID, Klant_ID, Totaalprijs, Factuur_Datum FROM Factuur
				WHERE Factuur_ID LIKE '%". $zoek . "%' OR Klant_ID LIKE '%". $zoek  ."%'
				OR Factuur_Datum LIKE '%". $zoek  ."%' OR Totaalprijs LIKE '%". $zoek  ."%' 
				ORDER BY Factuur_Datum DESC";

		} elseif (isset($_GET['zoek']) && !preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) {
			echo "<script>window.alert('Alleen letters en cijfers invoeren a.u.b.')</script>";
			$query = "SELECT Factuur_ID, Klant_ID, Totaalprijs, Factuur_Datum FROM Factuur ORDER BY Factuur_Datum DESC"
		} else {
			$query = "SELECT Factuur_ID, Klant_ID, Totaalprijs, Factuur_Datum FROM Factuur ORDER BY Factuur_Datum DESC"
			$stmt = $db->prepare(
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $factuur) {
			$factuurLink = "<a href='factuurGegevens.php?id=". $factuur['Factuur_ID'] ."'>";
			$klantLink = "<a href='klantGegevens.php?id=". $factuur['Klant_ID'] ."'>";
			echo '<tr>
				<td>'. $factuurLink . $factuur['Factuur_ID'] .'</a></td>
				<td>'. $klantLink . $factuur['Klant_ID'] .'</a></td>
				<td>'. $factuurLink . $factuur['Factuur_Datum'] .'</a></td>
				<td>'. $factuurLink . $factuur['Totaalprijs'] .'</a></td>
				<td>'. $factuurLink .'<button>Details</button></a></td>
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