<!DOCTYPE html>
<html>
<head>
	<title>Facturen - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php include 'menu.php' ?>

<div id='page'>
<div id='text'>
<?php
	if (isset($_POST['verwijder'])) {
		# Adminstratorrechten checken
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
	    	# Pagina checken 
	    	if (!isset($_GET['pagina'])) {
				$pagina = 0;
			} else {
				$pagina = $_GET['pagina'] - 1;
			}
			
			# productnaam ophalen
			$query = "SELECT Productnaam FROM Product WHERE Product_ID='" . $_POST['verwijder'] . "'";
	        $stmt = $db->prepare($query);
	        $stmt->execute();
	        $result = $stmt->fetch(); 

    		echo '<p class="center"> '.$result['Productnaam'].' is succesvol verwijderd.</p>';

			
			$verwijder = "DELETE FROM Product WHERE Product_ID='" . $_POST['verwijder'] . "'";
	        $stmt = $db->prepare($verwijder);
	        $stmt->execute();

	    } elseif (isset($_SESSION['Klant_ID']) ) {
			echo "U bent niet gemachtigd om deze pagina te bekijken.";
		}
	} else {
		echo '<p class="center"> Deze pagina bestaat niet. </p>';
	}
?>
			
</div>
</div>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>