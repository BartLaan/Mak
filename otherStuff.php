<!doctype HTML>
<html>
<head>
</head>
<body>
<?php 
	include 'database_connect.php';
	$q = strval($_GET['q']);
	$type = strval($_GET['type']);
	$sql = $db -> prepare('SELECT Foto FROM Ingredients WHERE Naam = "'.$q.'" AND Categorie = "'.$type.'"');
	$sql -> execute();
	while($row = $sql -> fetch()){
		echo("<img src = 'images/".$row["Foto"]."' alt = 'preview' style = 'width:80%; height:20%;'>");
	}
?>
</body>
</html>