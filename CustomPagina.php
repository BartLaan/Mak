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

.preview{
	position:absolute;
	top: -50px;
	left: -100px;
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
	color: #854442;
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
<script>

function visualizeTopping(var topping, var waarde){
	console.log("wow");
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(xmlhttp == null){
		alert("Gebruik alstublieft een betere browser.");
	}
	else if(waarde != TRUE){
		if(topping == 'kaars'){
			document.getElementByID("topping1").innerHTML = "";
		}
		else if(topping == 'hagelslag'){
			document.getElementByID("topping2").innerHTML = "";
		}
		else if(topping == "pannenkoeken"){
			document.getElementByID("topping3").innerHTML = "";
		}
	}
	else{
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(topping == "kaars"){
					document.getElementByID("topping1").innerHTML = xmlhttp.responseText;
				}
				else if(topping == "hagelslag"){
					document.getElementByID("topping2").innerHTML = xmlhttp.responseText;
				}
				else if(topping == "pannenkoeken"){
					document.getElementByID("topping3").innerHTML = xmlhttp.responseText;
				}
				
			}
		}
		xmlhttp.open("GET", "tehToppings.php?q="+topping, true);
		xmlhttp.send();
	}
}

</script>

<body> 
<?php
	include 'database_connect.php';
	$Product_Nr = 0;
	$BODEMERR = $VULLINGERR = "";
	$BODEM = $VULLING = $GLAZUUR = ""; $TOPPING1 = $TOPPING2 = $TOPPING3 = $TOPPING4 = $TOPPING5 = $TOPPING6 = 0;
	$CORRECTNESS = TRUE;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		for($z = 1; $z<7; $z++){
			if(!isset($_POST["topping'".$z."'"])){
				$TOPPING.$z = 0;
			}
			else if($TOPPING.$z == TRUE){
				$TOPPING.$z = 1;
			}
		}
		if(empty($_POST["vulling"])){
			$VULLINGERR = "U moet een vulling kiezen. <br>";
			$CORRECTNESS = FALSE;
		}
		else{
			$VULLING = $_POST["vulling"];
		}
		if(empty($_POST["bodem"])){
			$BODEMERR = "U moet een bodem kiezen. <br>";
			$CORRECTNESS = FALSE;
		}
		else{
			$BODEM = $_POST["bodem"];
		}
		if(empty($_POST["glazuur"])){
			$GLAZUUR = "geen";
		}
		else{
			$GLAZUUR = $_POST["glazuur"];
		}
		
		if($CORRECTNESS == TRUE){
			$sql = $db -> prepare('SELECT ID FROM customingredienten WHERE bodem = "' . $BODEM . '" AND vulling = "' . $VULLING . '" AND glazuur = "' . $GLAZUUR . '" AND topping1 = "' . $TOPPING[0] . '" AND topping2 = "' . $TOPPING[1] . '" AND topping3 = "' . $TOPPING[2] . '" AND topping4 = "' . $TOPPING[3] . '" AND topping5 = "' . $TOPPING[4] . '" AND topping6 = "' . $TOPPING[5] . '"');
			$sql -> execute();
			while($IDROW = $sql -> fetch()){
				if($IDROW > 0){
					$stmt = $db -> prepare('SELECT PRODUCT_ID FROM Product WHERE customIngredientenID = "' . $IDROW . '"');
					$stmt -> execute();
					$PRODUCTID = $sql -> fetch();
					
				}
			}
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
				<p class = "vereist"><?php echo $VULLINGERR;?>
				<?php echo $BODEMERR;?> </p>
				<div style = "min-width:300px; width:80%; height:250px;"> 
					<span class = "preview" id = "bodem"> <img src ="images/projectBarry/bodem1.png" alt = "preview" style = "width:80%; height:30%"> </span>
					<span class = "preview" id = "vulling"> <img src ="images/projectBarry/vulling1.png" alt = "preview" style = "width:80%; height:20%"> </span>
					<span class = "preview" id = "glazuur"> <img src ="images/projectBarry/glazuur1.png" alt = "preview" style = "width:80%; height:15%"> </span>
					<span class = "preview" id = "topping1"> </span>
					<span class = "preview" id = "topping2"> </span>
					<span class = "preview" id = "topping3"> </span>
					<span class = "preview" id = "topping4"> </span>
					<span class = "preview" id = "topping5"> </span>
					<span class = "preview" id = "topping6"> </span>
				</div>
			</div>
			<form method = "post"; action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class='ingredientChecker'>
				<h4> Kies Uw Toppings: </h4>
				<p>
					<?php
						include 'TrimLeadingZeroes.php';
						$ToppingsSQL = 'SELECT * FROM Ingredients WHERE Categorie = "topping"';
						$Y = 1;
						$stmt = $db->prepare($ToppingsSQL); 
						$stmt->execute();
							while($row = $stmt -> fetch()){
								echo "" . $row['Naam'] . " <input type = 'checkbox' name = 'topping".$Y."' onchange ='visualizeTopping(".$row['Naam'].", this.value)' value = TRUE> <br>";
							}
					?>
				</p>
				<h4> Kies een vulling: <span class = "vereist"> * </span></h4>
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
				<h4> Kies een bodem: <span class = "vereist"> * </span></h4>
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
		</div>
		<span style = "float:right"><?php echo '<form action="Winkelwagen.php" method="get">
        <input type="hidden" value="'.$Product_Nr.'" name="button">
        <input type="image" src="images/inwinkelwagen.png" onmouseover="this.src=\'images/inwinkelwagenhover.png\'" onmouseout="this.src=\'images/inwinkelwagen.png\'" alt="inwinkelwagen" height="40" /></form>'; ?> </span>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>