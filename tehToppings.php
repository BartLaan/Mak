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
	//This is essentially the toppings version of otherStuff, the only reason I did this differently, is because toppings were a checkbox instead of a radio
	//type of form, which made the variables annoying.
?>
</body>
</html>