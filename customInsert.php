<!doctype HTML>
<html>
<head>
</head>
<body>
	<?php
		$vulling = strval($_GET['vulling']);
		$bodem = strval($_GET['bodem']);
		$topping1 = intval($_GET['topping1']);
		$topping2 = intval($_GET['topping2']);
		$topping3 = intval($_GET['topping3']);
		$glazuur = strval($_GET['glazuur']);
		$sql = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 = "'.$topping1.'" AND topping2 = "'.$topping2.'" AND topping3 = "'.$topping3.'"');
		$sql -> execute();
		if(mysql_num_rows($sql) == 0){
			$stmt = $db -> prepare('INSERT INTO customingredienten(bodem, vulling, glazuur, topping1, topping2, topping3) VALUES(?,?,?,?,?,?)');
			$stmt -> bindValue(1, $vulling, PDO::PARAM_STR);
			$stmt -> bindValue(2, $bodem, PDO::PARAM_STR);
			$stmt -> bindValue(3, $glazuur, PDO::PARAM_STR);
			$stmt -> bindValue(4, $topping1, PDO::PARAM_INT);
			$stmt -> bindValue(5, $topping2, PDO::PARAM_INT);
			$stmt -> bindValue(6, $topping3, PDO::PARAM_INT);
			$stmt -> execute();
			$asdf = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 = "'.$topping1.'" AND topping2 = "'.$topping2.'" AND topping3 = "'.$topping3.'"');
			$asdf -> execute();
			while($reference = $asdf -> fetch()){
				$taart = $db -> prepare('INSERT INTO Product(Productnaam, Categorie, Prijs, Voorraad, img_filepath, Aanbieding, customIngredientenID) VALUES(?,?,?,?,?,?,?)');
				$taart -> bindValue(1, "Custom", PDO::PARAM_STR);
				$taart -> bindValue(2, "Aangepast", PDO::PARAM_STR);
				$taart -> bindValue(3, 59.99, PDO::PARAM_INT);
				$taart -> bindValue(4, -1, PDO::PARAM_INT);
				$taart -> bindValue(5, "images/AMERICA.jpg", PDO::PARAM_STR);
				$taart -> bindValue(6, 0.0, PDO::PARAM_INT);
				$taart -> bindValue(7, $reference, PDO::PARAM_STR);
				$taart -> execute();
				$gthf = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = "'.$reference.'"');
				$gthf -> execute();
				while($taartID = $gthf -> fetch()){
					echo($taartID);
				}
			}
		}
		else{
			$stmt = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = "'.$reference.'"');
			$stmt -> execute();
			while($taartID = $stmt -> fetch()){
				echo($taartID);
			}
		}
	?>
	
</body>
</html>