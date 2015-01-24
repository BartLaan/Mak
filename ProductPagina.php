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
        <?php             
            if(!empty($_GET["id"])) {
                $Product_Nr = $_GET["id"];
            } else {
                $Product_Nr = $_POST["button"];
            }

            if (!empty($_POST["naam"])) {
                $naam = $_POST["naam"];
            }
            if (!empty($_POST["sterren"])) {
                $sterren = $_POST["sterren"];
            }
            if (!empty($_POST["comment"])) {
                $recensie = $_POST["comment"];
            }
            $login = false;
            if(!empty($_SESSION['login_succes'])) {
                $login = $_SESSION['login_succes'];
                echo 'test';
            }
            include 'database_connect.php';
            include 'TrimLeadingZeroes.php';

            if(!empty($naam) && !empty($recensie)){
                if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
                    $get_klant_ID = 'SELECT Klant_ID FROM Klant WHERE Emailadres=?';
                    $stmt = $db->prepare($get_klant_ID);
                    $stmt->bindValue(11, $_SESSION['email'], PDO::PARAM_STR); 
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result as $row){
                        $Klant_ID = $row['Klant_ID'];
                    }

                    $add_recensie = 'INSERT INTO Recensies ( Product_ID, Klant_ID, Naam, Recensie, Recensie_Datum, Aantal_Sterren) VALUES (?, ?, ?, ?, ?, ?)';
                    $stmt = $db->prepare($add_recensie);
                    $stmt->bindValue(2, $Product_Nr, PDO::PARAM_INT); 
                    $stmt->bindValue(3, $Klant_ID, PDO::PARAM_INT); 
                    $stmt->bindValue(4, $naam, PDO::PARAM_STR);
                    $stmt->bindValue(5, $recensie, PDO::PARAM_STR);
                    $stmt->bindValue(6, date("Y-m-d H:i:s"), PDO::PARAM_STR); 
                    $stmt->bindValue(7, $sterren, PDO::PARAM_STR); 
                    $stmt->execute();
                } else {
                    echo 'U moet ingelogd zijn om recensies te plaatsen.';
                }


            }

            $productenSql = 'SELECT * FROM Product WHERE Product_ID=?';
            $stmt = $db->prepare($productenSql);
            $stmt->bindValue(1, $Product_Nr, PDO::PARAM_INT); 
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result) {
                echo "<br> <p class='center'> Deze pagina bestaat niet. Klik <a href='productCatalogus.php'>hier</a> om terug te gaan naar het overzicht.</p>";
            } else {

                foreach ($result as $row){

                    echo "<div class='productVak'>
                            <h1>".$row['Productnaam']."</h1>";
                        /*echo '<img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '">';*/
                        echo '<img onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0" src="images/' . $row["img_filepath"] . '" alt="taart">';

   
                        $check_aanbieding = false;
                        $prijs = trimLeadingZeroes($row["Prijs"]);

                        if ($row['Aanbieding'] != 00000000.00) {
                            $aanbieding =  trimLeadingZeroes($row['Aanbieding']); 
                            $check_aanbieding = true;
                        }

                        echo "<div class='beschrijvingsVak'>
                            <h3>Beschrijving </h3>
                            <p>".$row['Beschrijving']."</p>";
                            if ($check_aanbieding == true) {
                                echo "<p> Prijs: <em> &#128;".$prijs."</em></p>";
                                echo "<p class='afgeprijst'>  &#128;".$aanbieding." </p>";
                            } else { 
                                echo "<p> Prijs: &#128; ".$prijs. "</p>";
                            }
                        echo '<form action="Winkelwagen.php" method="post">
                            <input type="hidden" value="'.$Product_Nr.'" name="button">
                            <input type="submit" value="Toevoegen aan winkelwagen" /></form>';
                        echo "</div>

                        </div>";
            
                    echo "<hr>";
            
                    echo "<div class='informatieVak'>
            
                        <div class='tekstVak'>
                            <h3>Specificaties</h3>
                            <p> Gewicht: <b>".$row['Gewicht']."</b> gram</p> 
                        </div>";
                }
            
                        echo "<div class='tekstVak'>

                            <h3> Recencies</h3>";

                        $recensieSql = 'SELECT Naam, Recensie_Datum, Aantal_Sterren, Recensie FROM Recensies WHERE Product_ID=?';
                        $stamt = $db->prepare($recensieSql);
                        $stamt->bindValue(1, $Product_Nr, PDO::PARAM_INT); 
                        $stamt->execute();

                        $result = $stamt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row){
            
                            echo "<h4 class='name'>".$row['Naam']."</h4>
                                <h4 class='name'>".$row['Recensie_Datum']."</h4>
                                <h4 class='name'>".$row['Aantal_Sterren']." sterren</h4> 
                                <p>".$row['Recensie']."</p>
                            </div> ";
            
                        }
                        echo "<form action='ProductPagina.php?id=$Product_Nr' method='POST'> 
                            <h4 class='tekstKop'>Naam</h4>
                            <input type='text' name='naam'>
                            <h4 class='tekstKop'>Aantal sterren </h4>
                            <select name = 'sterren'>
                                    <option value = '0'> 0 </option>
                                    <option value = '1'> 1 </option>
                                    <option value = '2'> 2 </option>
                                    <option value = '3'> 3 </option>
                                    <option value = '4'> 4 </option>
                                    <option value = '5'> 5 </option>
                            </select> 
                            <h4 class='tekstKop'>Recensie</h4>
                            <textarea style='' float:none;' name='comment' cols='50' rows='10'></textarea> <br>
                            <input style='margin-top:10px' type='submit' value='Recensie plaatsen'/>
                        </form>";
                    
                    echo "</div>
                    </div>";
            }
        ?>
        
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>