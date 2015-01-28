<!DOCTYPE html>
<html>
<head>
    <title>Barry's Bakery - Beheerder</title>
	<link rel="stylesheet" type="text/css" >
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include 'menu.php'; ?>
    <div id="page">
    <div id="text">
        <h1>Welkom, administrator.</h1>
    </div>
        <ul>
            <li><a href="productenbeheren.php"><img src="images/producten.png" onmouseover="this.src=\'images/productenhover.png\'" onmouseout="this.src=\'images/producten.png\'" alt="Producten Beheren"></a></li>
            <li><a href="klantenbeheren.php"><img src="images/klanten.png" onmouseover="this.src=\'images/klantenhover.png\'" onmouseout="this.src=\'images/klanten.png\'" alt="Klanten Beheren"></a></li>
            <li><a href="facturen.php"><img src="images/facturen.png" onmouseover="this.src=\'images/facturenhover.png\'" onmouseout="this.src=\'images/facturen.png\'" alt="Facturen Beheren" height="40"></a></li>
        </ul>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>