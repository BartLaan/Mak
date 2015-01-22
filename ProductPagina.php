<?php
    session_start();
?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" type="text/css" href="mystyle.css">
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
    left: 50%;
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
</head>

<body> 

<?php include 'menu.php'; ?>
<div id="page">
    <div id="text">
        <?php 
            /*$naam = $_POST["naam"];
            $recensie = $_POST["comment"];*/
            $Product_Nr = $_GET["id"];

            include 'database_connect.php';

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

                    echo "<div class='productVak'>";
            
                        echo "<h1>".$row['Productnaam']."</h1>";
            
                        echo "<div class='afbeeldingsVak'>";
                        echo '<img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '">';
                        echo '<img  src="./Images/image.jpg" alt="1.jpg" style="cursor:pointer"';
                        echo 'onclick="showImage("./Images/image.jpg" alt="1.jpg");">';
                        echo '<div id="largeImgPanel" onclick="hideMe(this);">';
                        echo '<img id="largeImg" style="height: 100%; margin: 0; padding: 0;">';
                            
                        echo "</div>";

                        echo "<div class='beschrijvingsVak'>";
                            echo "<h3>Beschrijving </h3>";
                            echo "<p>".$row['Beschrijving']."</p>";
                            echo "<p> Prijs: &#128; ". $row['Prijs']. "</p>";
                            echo "<button type='button'> <a class='actieKnop' href='Winkelwagen.php'>Toevoegen aan winkelmandje</a> </button>   ";
                        echo "</div>";
            
                    echo "</div>";
            
                    echo "<hr>";
            
                    echo "<div class='informatieVak'>";
            
                        echo "<div class='tekstVak'>";
                            echo "<h3>Specificaties</h3>";
                            echo "<p> Gewicht: <b>".$row['Gewicht']."</b> gram</p> ";
                        echo "</div>";
                }
            
                        echo "<div class='tekstVak'>";

                        echo "<h3> Recencies</h3>";

                        $recensieSql = 'SELECT * FROM Recensies WHERE Product_ID=?';
                        $stamt = $db->prepare($recensieSql);
                        $stamt->bindValue(1, $Product_Nr, PDO::PARAM_INT); 
                        $stamt->execute();

                        $result = $stamt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row){
            
                            echo "<h4 class='name'>".$row['Naam']."</h4>";
                            echo "<h4 class='name'>".$row['Recensie_Datum']."</h4> ";
                            echo "<p>".$row['Recensie']."</p>";
                        echo "</div> ";
            
            
                        echo "<form >"; 
                            echo "<h4 class='tekstKop'>Naam</h4>";
                            echo "<input type='text' name='naam'> ";
                            echo "<h4 class='tekstKop'>Recensie</h4>";
                            echo "<textarea style='' float:none;' name='comment' cols='50' rows='10'></textarea> <br>";
                            echo "<input style='margin-top:10px' type='submit' value='Recensie plaatsen'/>";
                        echo "</form>";
                    }
                    echo "</div>";
                echo "</div>";
            }
        ?>
        <script src="enlargeImage.js" 
        type="application/javascript">  
        </script>  
        
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>