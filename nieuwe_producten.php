<?php
	$nieuwe_productenSql = "SELECT Product_IDProductnaam, Prijs, img_filepath FROM  `Product` WHERE  Productnaam != 'nefne' ORDER BY Toevoegingsdatum DESC LIMIT 3 ";
	$stmt = $db->prepare($nieuwe_productenSql); 
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

	$count = 0;
	foreach ($result as $row) {
		echo '<div class="afbeeldingKop" id="afbeeldingKop'.$count.'" >
            <a href="ProductPagina.php?id='.$row['Product_ID'].'">
            <div class="achtergrondVak" style="background-image: url(images/'. $row["img_filepath"]. ')">

            </div>

            <div class="productVak">
                <img src="images/' .$row["img_filepath"]. '"  alt="'.$row["Productnaam"].'">
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>'.$row["Productnaam"].'</i> <br> <span style="font-style:bold"> &euro; '.trimLeadingZeroes($row["Prijs"]).' </span> </p>
            </div>
            </a>
        </div>';
        $count++;
	}

?>