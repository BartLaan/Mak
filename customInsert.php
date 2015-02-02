<!doctype HTML>
<html>
<head>
</head>
<body>
	<?php
		include 'database_connect.php';
		$vulling = $_GET['vulling'];
		$bodem = $_GET['bodem'];
		$topping1 = $_GET['topping1'];
		$topping2 = $_GET['topping2'];
		$topping3 = $_GET['topping3'];
		$glazuur = $_GET['glazuur'];
		$sql = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 ='.$topping1.' AND topping2 ='.$topping2.' AND topping3 ='.$topping3);
		$sql -> execute();
		$res = $sql->fetchAll();
		if(!$res){
			$stmt = $db -> prepare('INSERT INTO customingredienten(vulling, bodem, glazuur, topping1, topping2, topping3) VALUES("'.$vulling.'","'.$bodem.'","'.$glazuur.'",'.$topping1.','.$topping2.','.$topping3.')');
			$stmt -> execute();
			
			$newID = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 = '.$topping1.' AND topping2 = '.$topping2.' AND topping3 ='.$topping3);
			$newID -> execute();
			$result = $newID->fetchAll();
			$freshID = $result[0]['ID'];

			$inProducten = $db-> prepare('INSERT INTO Product(Productnaam, Categorie, Prijs, Voorraad, img_filepath, Aanbieding, customIngredientenID) VALUES("Custom taart","Aangepast",59.99,1,"images/AMERICA.jpg",0.0,'.$freshID.')');
			$inProducten-> execute();

			$gthf = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = '.$freshID);
			$gthf -> execute();
			$result = $gthf->fetchAll();
			echo $result[0]['Product_ID'];		
		} else {
			$stmt = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = '.$res[0]["ID"]);
			$stmt -> execute();
			$result = $stmt->fetchAll();
			echo $result[0]['Product_ID'];
		}
	?>
	
</body>
</html>