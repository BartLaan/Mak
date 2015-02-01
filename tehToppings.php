<!doctype HTML>
<html>
<head>
</head>
<body>
<?php
	include 'database_connect.php';
	$q = strval($_GET['q']);
	$sql = $db -> prepare('SELECT Foto FROM Ingredients WHERE Naam = "'.$q.'" AND Categorie = "topping"');
	$sql -> execute();
	while($row = $sql -> fetch()){
		echo("<img src ='images/".$row["Foto"]."' alt = 'preview' style = 'width:80%;'>");
	}
?>
</body>
</html>