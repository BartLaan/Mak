<!DOCTYPE html>
<html>
<head>
	<title>Toegevoegd - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php include 'menu.php' ?>

<div id='page'>
<div id='text'>
<?php
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
			
    		echo '<p class="center"> Het product is succesvol toegevoegd.</p>';
    		echo '<p class="center">Klik <a href="productenoverzicht.php">hier</a> om terug te gaan naar het overzicht.</p>';

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