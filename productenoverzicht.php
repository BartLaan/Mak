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
<?php include 'TrimLeadingZeroes.php' ?>

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
			<h1>Producten</h1>
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
			$query = "SELECT Product_ID, Productnaam, Categorie, Prijs, Voorraad FROM Product
				WHERE Productnaam LIKE '%". $zoek . "%' OR Categorie LIKE '%". $zoek  ."%'
				OR Prijs LIKE '%". $zoek  ."%' OR Voorraad LIKE '%". $zoek  ."%' 
				ORDER BY Productnaam LIMIT 10 OFFSET ". ($pagina * 10);

		} elseif (isset($_GET['zoek']) && !preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) {
			echo "<script>window.alert('Alleen letters en cijfers invoeren a.u.b.')</script>";
			$query = "SELECT Product_ID, Productnaam, Categorie, Prijs, Voorraad FROM Product ORDER BY Productnaam LIMIT 10 OFFSET ". ($pagina * 10);
		} else {
			$query = "SELECT Product_ID, Productnaam, Categorie, Prijs, Voorraad FROM Product ORDER BY Productnaam LIMIT 10 OFFSET ". ($pagina * 10);
		}
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $product) {
			$productLink = "<a href='productGegevens.php?id=". $product['Product_ID'] ."'>";
			echo '<tr>
				<td>'. $productLink . $product['Productnaam'] .'</a></td>
				<td>'. $productLink . $product['Categorie'] .'</a></td>
				<td>'. $productLink .' &#128; '. trimLeadingZeroes($product['Prijs']) .'</a></td>
				<td>'. $productLink . $product['Voorraad'] .'</a></td>
				<td>'. $productLink .'<button>Details</button></a></td>
				<td> <form id="form" action="verwijder_product.php" method="POST">
                <input type="hidden" name="verwijder" value="' . $product['Product_ID'] . '" >
                <input type="image" src="images/prullenbak.png" alt="Verwijder" onclick="verwijder_check()" width="20" height="20">
                </form> </td>
        }
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
			echo '<button src="product_toevoegen.php"> ';
		
    } elseif (isset($_SESSION['Klant_ID']) ) {
		echo "U bent niet gemachtigd om deze pagina te bekijken.";
	}
?>
			
</div>
</div>

<script type="text/javascript" >

    function verwijder_check() {
        if (confirm("Weet u zeker dat u dit product wilt verwijderen?") == true) {
            document.getElementById("form").submit();
        }
    }
</script>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>