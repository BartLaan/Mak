<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" type="text/css" >
<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
<title> Product </title>
<style>

*
{
    float:none;
}

h1 {
    font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
}

h4.name {
    line-height: 40%;
    margin-bottom: 0px;
}

h4.tekstKop 
{ 
    margin-bottom: 0px;
}

.actieKnop
{
    text-decoration:none;
    color:black;
}

.productVak
{
    position:relative;
    float: left;
    color: #3c2f2f;
    text-align:left;
    width: 100%;
    padding-left: 5%;    
    padding-top: 5%;
    padding-bottom: 10%;
}

.ingredients
{
	float:right;
	width:100%;
}

.ingredientChecker
{
	text-align:right;
	float:right;
	overflow:auto;
}

.ingredientChecker2
{
	text-align:right;
	float:right;
	margin-right:3%;
	overflow:auto;
}

.informatieVak
{
    color: black;
    padding-left: 5%;    
    padding-top: 5%;
}

.beschrijvingsVak
{
    padding-bottom: 10%;
    position: relative;
    text-align:left;
    width: 50%;
}
 
.beschrijvingsVak h3
{
    font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
    font-size:175%;
    padding-top: 10px;
    color:black;
}

.beschrijvingsVak p
{
    font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
    font-weight:lighter;
    font-size:175%;
    color:black;
}

.beschrijvingsVak h3
{
    margin-top:0px;
}

.tekstVak
{
    width:65%;
}

.tekstVak p
{
    margin-top:3px;
    margin-bottom:3px;
}

.afbeeldingsVak
{
    position: absolute;
    float:left;
    text-align: center;
}

.afbeeldingsVak img
{   
    float: left;
    min-width:20%;
    max-width:40%;
    min-height:20%;
    max-height:40%;
}

p.center {
    text-align: center;
    font-size: 20px;
}

.vereist{
	color: red;
}

em
{
    text-decoration: line-through;
}

p.afgeprijst
{
    color: #854442;
}

</style>

</head>

<body> 
<?php
	$BODEMERR = $VULLINGERR = "";
	$BODEM = $VULLING = $GLAZUUR = "";
	$CORRECTNESS = TRUE;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["topping[]"])){
			$TOPPING = array();
		}
		else{
			$TOPPING = $_POST["topping[]"];
		}
		if(empty($_POST["vulling"])){
			$VULLINGERR = "U moet een vulling kiezen."
		}
	}
?>

<?php include 'menu.php'; ?>

<?php
if (!empty($_POST['button'])) {  
    $_SESSION['winkelwagen'] [] = $_POST['button'];
}
?>

<div id="page">
    <div id="text">
		<div class ='ingredients'>
			<div style = 'float:left; text-align:left; width:50%;'>
				<h1 style ='text-align:left;'> Maak uw Eigen Taart! </h1>
				<img src= 'images/cyan.jpg' alt ="Barry's taart" style = "width:80%; height:250px;">
			</div>
			<form method = "post"; action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class='ingredientChecker'>
				<h4> Kies Uw Toppings: </h4>
				<p>
					<?php include 'database_connect.php';
						include 'TrimLeadingZeroes.php';
						$ToppingsSQL = 'SELECT * FROM Ingredients WHERE Categorie = "topping"';
						$stmt = $db->prepare($ToppingsSQL); 
						$stmt->execute();
							while($row = $stmt -> fetch()){
								echo '' . $row["Naam"] . ' <input type = "checkbox" name = "topping[]" value = '. $row["Naam"].'> <br>';
							}
					?>
				</p>
				<h4> Kies een vulling: <span class = "vereist"> * <?php echo . $VULLINGERR . ?> </span></h4>
				<p>
					<?php
						$VullingSQL = 'SELECT * FROM Ingredients WHERE Categorie = "vulling"';
						$stmt = $db -> prepare($VullingSQL);
						$stmt -> execute();
							while($row = $stmt -> fetch()){
								echo '' . $row["Naam"] . ' <input type = "radio" name = "vulling" value = '. $row["Naam"] .'> <br>';
							}
					?>
				</p>
			</div>
			<div class = 'ingredientChecker2'>
				<h4> Kies een bodem: <span class = "vereist"> * <?php echo . $BODEMERR . ?> </span></h4>
				<p>
					<?php
						$BodemSQL = 'SELECT * FROM Ingredients WHERE Categorie = "bodem"';
						$stmt = $db -> prepare($BodemSQL);
						$stmt -> execute();
							while($row = $stmt -> fetch()){
								echo '' . $row["Naam"] . ' <input type = "radio" name = "bodem" value = '. $row["Naam"] .'> <br>';
							}
					?>
				</p>
				<h4> Kies een glazuur: </h4>
				<p>
					<?php
						$GlazuurSQL = 'SELECT * FROM Ingredients WHERE Categorie = "glazuur"';
						$stmt = $db -> prepare($GlazuurSQL);
						$stmt -> execute();
							while($row = $stmt -> fetch()){
								echo '' . $row["Naam"] . ' <input type = "radio" name = "glazuur" value = '. $row["Naam"] .'> <br>';
							}
					?>
				</p>
			</div>
			<input type = "submit" name = "customSubmit" value = "Voeg toe aan winkelmandje" style = "float:right">
		</div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>