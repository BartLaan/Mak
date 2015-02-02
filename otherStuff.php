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
		echo("<img src = 'images/".$row["Foto"]."' alt = 'preview' style = 'width:80%;'>");
	}
	// This is made for the AJAX script in CustomPagina.php, when a bodem/glazuur/vulling gets chosen. If it gets chosen, this script will return the
	// corresponding image file, which is found in the database.
?>
</body>
</html>