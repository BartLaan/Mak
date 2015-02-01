<!DOCTYPE html>
<html>
<head>
	<title>Producten beheren - Barry's Bakery</title>
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
        $admin = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form action="log_in.php" method="POST">
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if (isset($_SESSION['Klant_ID']) && $admin && strlen($admin["Emailadres"]) > "0") {
    	if (!isset($_GET['pagina'])) {
			$pagina = 0;
		} else {
			$pagina = $_GET['pagina'] - 1;
		}
    	echo '
			<h1>Facturen</h1>
			<div align="center">
			<form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
				<input type="text" name="zoek">
				<input type="submit" name="submit" value="Zoeken">
			</form>
			</div> <br />
			<table>
				<tr>
					<th>Naam</th>
					<th>Categorie</th>
					<th>Prijs</th>					
					<th>Voorraad</th>
				</tr>
		';
		# Check of gebruiker een zoekopdracht heeft gedaan en constructeer bijbehorende query
		if (isset($_GET['zoek']) && preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) 
		{
			$zoek = $_GET['zoek'];
			$query = "SELECT Productnaam, Categorie, Prijs, Voorraad FROM Product
				WHERE Productnaam LIKE '%". $zoek . "%' OR Categorie LIKE '%". $zoek  ."%'
				OR Prijs LIKE '%". $zoek  ."%' OR Voorraad LIKE '%". $zoek  ."%' 
				ORDER BY Productnaam DESC LIMIT 10 OFFSET ". ($pagina * 10);

		} elseif (isset($_GET['zoek']) && !preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) {
			echo "<script>window.alert('Alleen letters en cijfers invoeren a.u.b.')</script>";
			$query = "SELECT Productnaam, Categorie, Prijs, Voorraad FROM Product ORDER BY Productnaam DESC LIMIT 10 OFFSET ". ($pagina * 10);
		} else {
			$query = "SELECT Productnaam, Categorie, Prijs, Voorraad FROM Product ORDER BY Productnaam DESC LIMIT 10 OFFSET ". ($pagina * 10);
		}
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $product) {
			$productLink = "<a href='productGegevens.php?id=". $factuur['Factuur_ID'] ."'>";
			echo '<tr>
				<td>'. $productLink . $product['Productnaam'] .'</a></td>
				<td>'. $productLink . $product['Categorie'] .'</a></td>
				<td>'. $productLink . $product['Prijs'] .'</a></td>
				<td>'. $productLink .' &#128; '. $factuur['Voorraad'] .'</a></td>
				<td>'. $productLink .'<button>Details</button></a></td>
			</tr>
			';
		}
		echo '</table><div align="center">';
		if ($pagina != 0) {
			echo '
				<br />
				<form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
					<input type="hidden" value="'. $pagina .'" name="pagina">
					<input type="submit" name="submit" value="Vorige pagina">
				</form>
			';
		}
			echo '
				<br />
				<form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
					<input type="hidden" value="'. ($pagina + 2) .'" name="pagina">
					<input type="submit" name="submit" value="Volgende pagina">
				</form>
				</div>
			';
		
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