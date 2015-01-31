<?php
    # de 3 laatst toegevoegde producten ophalen
	$nieuwe_productenSql = "SELECT Productnaam, Prijs, img_filepath FROM  `Product`   ORDER BY Toevoegingsdatum DESC LIMIT 3 ";
	$stmt = $db->prepare($nieuwe_productenSql); 
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    # count voor de teller van de slideshow
	$count = 0;
	foreach ($result as $row) {
		echo '<div class="afbeeldingKop" id="afbeeldingKop'.$count.'" >
            <div class="achtergrondVak" style="background-image: url(images/'. $row["img_filepath"]. ')">

            </div>

            <div class="productVak">
                <img src="images/' .$row["img_filepath"]. '"  alt="'.$row["Productnaam"].'">
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>'.$row["Productnaam"].'</i> <br> <span style="font-style:bold"> &euro; '.trimLeadingZeroes($row["Prijs"]).' </span> </p>
            </div>
        </div>';
        $count++;
	}

?>