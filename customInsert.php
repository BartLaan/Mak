<!doctype HTML>
<html>
<head>
</head>
<body>
	<?php
		include 'database_connect.php';
		$vulling = strval($_GET['vulling']);
		$bodem = strval($_GET['bodem']);
		$topping1 = intval($_GET['topping1']);
		$topping2 = intval($_GET['topping2']);
		$topping3 = intval($_GET['topping3']);
		$glazuur = strval($_GET['glazuur']);
		$sql = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 = "'.$topping1.'" AND topping2 = "'.$topping2.'" AND topping3 = "'.$topping3.'"');
		$sql -> execute();
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		if(!isset($res['ID'])){
			$stmt = $db -> prepare('INSERT INTO customingredienten(vulling, bodem, glazuur, topping1, topping2, topping3) VALUES("'.$vulling.'","'.$bodem.'","'.$glazuur.'",'.$topping1.','.$topping2.','.$topping3.')');
			$stmt -> execute();
			
			$newID = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 = "'.$topping1.'" AND topping2 = "'.$topping2.'" AND topping3 = "'.$topping3.'"');
			$newID -> execute();
			$result = $newID->fetchAll();
			$freshID = $result['ID'];

			$inProducten = $db-> prepare('INSERT INTO Product(Productnaam, Categorie, Prijs, Voorraad, img_filepath, Aanbieding, customIngredientenID) VALUES("Custom taart","Aangepast",59.99,1,"images/AMERICA.jpg",0.0,'.$freshID.')');
			$inProducten-> execute();

			// while($reference = $newID -> fetch()){
			// 	$taart = $db -> prepare('INSERT INTO Product(Productnaam, Categorie, Prijs, Voorraad, img_filepath, Aanbieding, customIngredientenID) VALUES(?,?,?,?,?,?,?)');
			// 	// $taart -> bindValue(1, "Custom", PDO::PARAM_STR);
			// 	// $taart -> bindValue(2, "Aangepast", PDO::PARAM_STR);
			// 	// $taart -> bindValue(3, 59.99, PDO::PARAM_INT);
			// 	// $taart -> bindValue(4, -1, PDO::PARAM_INT);
			// 	// $taart -> bindValue(5, "images/AMERICA.jpg", PDO::PARAM_STR);
			// 	// $taart -> bindValue(6, 0.0, PDO::PARAM_INT);
			// 	// $taart -> bindValue(7, $reference, PDO::PARAM_STR);
			// 	$taart -> execute();
			$gthf = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = "'.$freshID.'"');
			$gthf -> execute();
			$result = $gthf->fetchAll();
			echo $result['Product_ID'];
				// while($taartID = $gthf -> fetch()){
				// 	echo($taartID);
				// }
		
		} else{
			$stmt = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = "'.$res['ID'].'"');
			$stmt -> execute();
			$result = $stmt->fetchAll();
			echo $taartID;
			}
		}
	?>
	
</body>
</html>