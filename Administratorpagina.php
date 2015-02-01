<!DOCTYPE html>
<html>
<head>
    <title>Administratie - Barry's Bakery</title>
    <link href="opmaak.css" rel="stylesheet" type="text/css" />
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
    
<style>
    #knoppen {
        text-align: center;
    }
    #knoppen-lijst li {
        display: inline;
        list-style-type: none;
        padding-right: 20px;
    }
</style>
</head>
<body>
<?php include 'menu.php'; ?>
    <div id="page">
    <div id="text">
<?php
    # Check administrator
    if (isset($_SESSION['Klant_ID'])) {
        $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form>
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if ($result && strlen($result["Emailadres"]) > "0") {
    # Doorverwijsknoppen
        echo '
            <h1>Welkom, administrator</h1>
            <br /><br />
            <div id="knoppen">
                <ul id="knoppen-lijst">
                    <li><a href="productenBeheren.php"><img src="images/producten.png" onmouseover="this.src=\'images/productenhover.png\'" onmouseout="this.src=\'images/producten.png\'" alt="Producten Beheren" height="50"></a></li>
                    <li><a href="klantenBeheren.php"><img src="images/klanten.png" onmouseover="this.src=\'images/klantenhover.png\'" onmouseout="this.src=\'images/klanten.png\'" alt="Klanten Beheren" height="50"></a></li>
                    <li><a href="facturen.php"><img src="images/facturen.png" onmouseover="this.src=\'images/facturenhover.png\'" onmouseout="this.src=\'images/facturen.png\'" alt="Facturen Beheren" height="50"></a></li>
                </ul>
            </div>
        ';
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
    }
?>
    </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>