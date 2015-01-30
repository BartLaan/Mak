<?php
include 'database_connect.php';
$product_idSql = "SELECT Product_ID FROM Product";
$stmt = $db->prepare($product_idSql); 
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

foreach ($result as $row) {
	$populair = "SELECT COUNT(Product_ID) AS Product_Count, Product_ID FROM Product_Bestelling_Doorverwijzing WHERE Product_ID = '".$row['Product_ID']."'";
	$pop = $db->prepare($populair);
	$pop->execute();

	foreach ($pop->fetchAll(PDO::FETCH_ASSOC) as $count) {
		$pop_producten[$count['Product_ID']] = $count['Product_Count'];
	}
}

arsort($pop_producten);

$count = 0;
foreach($pop_producten as $x => $x_value) {
	$count++;
	$popu = "SELECT Productnaam, img_filepath, Prijs FROM Product WHERE Product_ID = '".$x."'";
	$pop_pr = $db->prepare($popu);
	$pop_pr->execute();

	foreach ($pop_pr as $product) { 
	echo '<div class="product">
        <div class="productAfbeelding">
            <img   src="'.$product["img_filepath"].'" alt="'.$product["img_filepath"].'"> </img>
        </div>
        <div class="productBeschrijving">
            <p> '.$product["Productnaam"].' <br> '.$product["Prijs"].'</p>
        </div>
    </div>';
	}
	echo $x;
	echo ' -- ';
	echo $x_value;
	echo '<br>';
	if ($count == 5) break;
} 
?>
