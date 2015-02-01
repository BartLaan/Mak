<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" type="text/css" >
<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
<title> Maak uw eigen taart! - Barry's Bakery </title>
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
<script type = "text/javascript">

function databaseChecker(){
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
	else{
		var vulling = document.forms["ingredientPicker"]["vulling"].value;
		var bodem = document.forms["ingredientPicker"]["bodem"].value;
		if(vulling != null||vulling != ""){
			if(bodem != null||bodem != ""){
			if(document.getElementById("topping1").checked){
				var topping1 = 1;
			}
			else{
				var topping1 = 0;
			}
			if(document.getElementById("topping2").checked){
				var topping2 = 1;
			}
			else{
				var topping2 = 0;
			}
			if(document.getElementById("topping3").checked){
				var topping3 = 1;
			}
			else{
				var topping3 = 0;
			}
			var glazuur = document.forms["ingredientPicker"]["glazuur"].value;
			if(glazuur == null||glazuur == ""){
				glazuur = "";
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("winkelwagen").value = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "customInsert.php?vulling="+vulling+"&bodem="+bodem+"&topping1="+topping1+"&topping2="+topping2+"&topping3="+topping3+"&glazuur="+glazuur, true);
			console.log("customInsert.php?vulling="+vulling+"&bodem="+bodem+"&topping1="+topping1+"&topping2="+topping2+"&topping3="+topping3+"&glazuur="+glazuur);
			xmlhttp.send();
			}
		}
	}
}

function visualizeElse(vision, type){
	console.log(vision);
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
	else if(!document.getElementById(vision).checked){
		document.getElementById(type).innerHTML = "";
	}
	else{
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById(type).innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "otherStuff.php?q="+vision+"&type="+type, true);
		console.log("otherStuff.php?q="+vision+"&type="+type);
		xmlhttp.send();
	}
}

function visualizeTopping(topping){
	console.log(topping);
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
	else if(!document.getElementById(topping).checked){
		if(topping == "Kaars"){
			document.getElementById("topping1").innerHTML = "";
			console.log("fout");
		}
		else if(topping == "Hagelslag"){
			document.getElementById("topping2").innerHTML = "";
		}
		else if(topping == "Pannenkoeken"){
			document.getElementById("topping3").innerHTML = "";
		}
	}
	else{
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(topping == "Kaars"){
					document.getElementById("topping1").innerHTML = xmlhttp.responseText;
					console.log("goed");
				}
				else if(topping == "Hagelslag"){
					document.getElementById("topping2").innerHTML = xmlhttp.responseText;
				}
				else if(topping == "Pannenkoeken"){
					document.getElementById("topping3").innerHTML = xmlhttp.responseText;
				}
			}
		}
		xmlhttp.open("GET", "tehToppings.php?q="+topping, true);
		console.log("tehToppings.php?q="+topping);
		xmlhttp.send();
	}
}

</script>

<body> 
<?php
	include 'database_connect.php';
	$Product_Nr = 0;
	$BODEMERR = $VULLINGERR = "";
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
					<span class = "preview" id = "bodem"> </span>
					<span class = "preview" id = "vulling"> </span>
					<span class = "preview" id = "glazuur"> </span>
					<span class = "preview" id = "topping1"> </span>
					<span class = "preview" id = "topping2"> </span>
					<span class = "preview" id = "topping3"> </span>
					<span class = "preview" id = "topping4"> </span>
					<span class = "preview" id = "topping5"> </span>
					<span class = "preview" id = "topping6"> </span>
				</div>
			</div>
			<form name = "ingredientPicker"; method = "post"; action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
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
								echo $row['Naam'] . "<input type='checkbox' name='topping".$Y."' onchange='visualizeTopping(this.value); databaseChecker()' value = \"".$row['Naam']."\" id = \"".$row['Naam']."\"> <br>";								
								$Y = $Y++;
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
								echo '' . $row["Naam"] . ' <input type = "radio" name = "vulling" onchange = "visualizeElse(this.value, \'vulling\'); databaseChecker()" value = "'. $row["Naam"] .'" id = "'.$row["Naam"].'"> <br>';
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
								echo '' . $row["Naam"] . ' <input type = "radio" name = "bodem" onchange = "visualizeElse(this.value, \'bodem\'); databaseChecker()" value = "'. $row["Naam"] .'" id = "'.$row["Naam"].'"> <br>';
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
								echo '' . $row["Naam"] . ' <input type = "radio" name = "glazuur" onchange = "visualizeElse(this.value, \'glazuur\'); databaseChecker()" value = "'. $row["Naam"] .'" id = "'.$row["Naam"].'"> <br>';
							}
					?>
				</p>
			</div>
		</div>
		<span style = "float:right">
		<?php echo '<form action="Winkelwagen.php" method="POST">
        <input type="hidden" name="winkelwagen" id = "winkelwagen">
        <input type="image" src="images/inwinkelwagen.png" onmouseover="this.src=\'images/inwinkelwagenhover.png\'" onmouseout="this.src=\'images/inwinkelwagen.png\'" alt="inwinkelwagen" height="40" /></form>'; ?> </span>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>