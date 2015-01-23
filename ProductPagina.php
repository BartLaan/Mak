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

    color:black;
}

.beschrijvingsVak p
{
    font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
    font-weight:lighter;
    color:black;
    font-size:175%;

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

#$winkelwagen_array = array(); 

if (!empty($_POST['button'])) {  
    /*$winkelwagen_array[$_POST['button']] = $_POST['button'];
    $_SESSION['winkelwagen'] = $winkelwagen_array;*/
    $_SESSION['winkelwagen'] [] = $_POST['button'];
}
?>

<div id="page">
    <div id="text">
        <?php 
            /*$naam = $_POST["naam"];
            $recensie = $_POST["comment"];*/
            if(!empty($_GET["id"])) {
                $Product_Nr = $_GET["id"];
            } else {
                $Product_Nr = $_POST["button"];
            }

            include 'database_connect.php';
            include 'TrimLeadingZeroes.php';

            # recensie toevoegen, moet je voor ingelogd zijn, komt later dus
            /*if(!empty($naam) && !empty($recensie) ){

            $add_recensie = 'INSERT INTO Recensies .... '

            }*/

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
                                echo "<p> Oude prijs: &#128;".$prijs."</p>";
                                echo "<p> Aanbieding prijs: &#128;".$aanbieding." </p>";
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

                        $recensieSql = 'SELECT * FROM Recensies WHERE Product_ID=?';
                        $stamt = $db->prepare($recensieSql);
                        $stamt->bindValue(1, $Product_Nr, PDO::PARAM_INT); 
                        $stamt->execute();

                        $result = $stamt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row){
            
                            echo "<h4 class='name'>".$row['Naam']."</h4>
                                <h4 class='name'>".$row['Recensie_Datum']."</h4> 
                                <p>".$row['Recensie']."</p>
                            </div> ";
            
            
                        echo "<form > 
                            <h4 class='tekstKop'>Naam</h4>
                            <input type='text' name='naam'> 
                            <h4 class='tekstKop'>Recensie</h4>
                            <textarea style='' float:none;' name='comment' cols='50' rows='10'></textarea> <br>
                            <input style='margin-top:10px' type='submit' value='Recensie plaatsen'/>
                        </form>";
                    }
                    echo "</div>
                    </div>";
            }
        ?>
        
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>