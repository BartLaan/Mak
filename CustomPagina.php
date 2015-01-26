<?php
    session_start();
?>

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

.ingredientChecker
{
	float: right;
	width: 100%;
	border:solid;
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



em
{
    text-decoration: line-through;
}

p.afgeprijst
{
    color: #854442;
}

</style>

<script language="javascript">
function bigImg(x) {
    x.style.height = "600px";
}
function normalImg(x) { 
    x.style.height = "250px"
}

</script>

</head>

<body> 

<?php include 'menu.php'; ?>

<?php


if (!empty($_POST['button'])) {  
    $_SESSION['winkelwagen'] [] = $_POST['button'];
}
?>

<div id="page">
    <div id="text">
		<div id='ingredientChecker'>
			<?php include 'database_connect.php';
				include 'TrimLeadingZeroes.php';

				$ToppingsSQL = 'SELECT * FROM Ingredients WHERE Categorie = "topping"';
				$stmt = $db->prepare($ToppingsSQL); 
				$stmt->execute();
					while($row = $stmt -> fetch()){
						echo '' . $row["Naam"] . ' <input type = "checkbox" name = "topping" value = '. $row["Naam"].'> <br>';
					}
			?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>