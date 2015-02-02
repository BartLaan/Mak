<!doctype HTML>
<html>
<head>
</head>
<body><?php
		include 'database_connect.php';

		$vulling = $_GET['vulling'];
		$bodem = $_GET['bodem'];
		$topping1 = $_GET['topping1'];
		$topping2 = $_GET['topping2'];
		$topping3 = $_GET['topping3'];
		$glazuur = $_GET['glazuur'];
		
		# Check of de aangepaste taart al in de database voorkomt
		$sql = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 ='.$topping1.' AND topping2 ='.$topping2.' AND topping3 ='.$topping3);
		$sql -> execute();
		$res = $sql->fetchAll();

		# zoniet, stop hem erin (wink wink)
		if(!$res){
			$stmt = $db -> prepare('INSERT INTO customingredienten(vulling, bodem, glazuur, topping1, topping2, topping3) VALUES("'.$vulling.'","'.$bodem.'","'.$glazuur.'",'.$topping1.','.$topping2.','.$topping3.')');
			$stmt -> execute();
			
			# zoek het ID van de nieuwe taart
			$newID = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "'.$bodem.'" AND vulling = "'.$vulling.'" AND glazuur = "'.$glazuur.'" AND topping1 = '.$topping1.' AND topping2 = '.$topping2.' AND topping3 ='.$topping3);
			$newID -> execute();
			$result = $newID->fetchAll();
			$freshID = $result[0]['ID'];

			# Stop de taart in Producttabel
			$inProducten = $db-> prepare('INSERT INTO Product(Productnaam, Categorie, Prijs, Voorraad, img_filepath, Aanbieding, customIngredientenID) VALUES("Custom taart","Aangepast",59.99,1,"images/AMERICA.jpg",0.0,'.$freshID.')');
			$inProducten-> execute();

			# Neem het product_ID van de nieuwe taart
			$gthf = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = '.$freshID);
			$gthf -> execute();
			$result = $gthf->fetchAll();
			$Product_ID = str_replace(' ', '', $result[0]['Product_ID']);
			echo $Product_ID;
		# Als de taart wel bestond, neem dat product_id dan		
		} else {
			$stmt = $db -> prepare('SELECT Product_ID FROM Product WHERE customIngredientenID = '.$res[0]["ID"]);
			$stmt -> execute();
			$result = $stmt->fetchAll();
			$Product_ID = str_replace(' ', '', $result[0]['Product_ID']);
			echo $Product_ID;
		}
?></body>
</html>