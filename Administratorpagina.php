<!DOCTYPE html>
<html>
<head>
    <title>Barry's Bakery - Beheerder</title>
    <link href="opmaak.css" rel="stylesheet" type="text/css" />
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
    
<style>
    #knoppen li {
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
        <h1>Welkom, administrator.</h1>
        <ul id="knoppen">
            <li><a href="productenbeheren.php"><img src="images/producten.png" onmouseover="this.src=\'images/productenhover.png\'" onmouseout="this.src=\'images/producten.png\'" alt="Producten Beheren" height="40"></a></li>
            <li><a href="klantenbeheren.php"><img src="images/klanten.png" onmouseover="this.src=\'images/klantenhover.png\'" onmouseout="this.src=\'images/klanten.png\'" alt="Klanten Beheren" height="40"></a></li>
            <li><a href="facturen.php"><img src="images/facturen.png" onmouseover="this.src=\'images/facturenhover.png\'" onmouseout="this.src=\'images/facturen.png\'" alt="Facturen Beheren" height="40"></a></li>
        </ul>
    </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>