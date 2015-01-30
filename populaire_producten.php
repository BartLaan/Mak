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

arsort($pop_prodructen);

foreach($pop_producten as $x => $x_value) {
	$count++;
	echo $x;
	if ($count == 5) break;
} 
?>
