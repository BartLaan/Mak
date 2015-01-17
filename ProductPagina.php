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

h4.tekstKop
{
    margin-bottom:0px;
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
    border:1px solid blue;
    margin-top: 10px
    color: #3c2f2f;
    text-align:left;
}

.informatieVak
{
    color: black;
    margin-top:0%;
}

.beschrijvingsVak
{
    
    margin: 3%;
    margin-top: 0px;
    margin-left:1px;
    margin-right: 1%;
    position: relative;
    float:right;
    text-align:left;
    border-style: thin;
    border-color: red;
    width:70%;
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
    min-width:10%;
    width:40%;
    min-height:20%;
    max-height:40%;
    text-align: center;
}

.afbeeldingsVak img
{
    min-width:80%;
    width:100%;
}

</style>
</head>

<body>

<?php include 'menu.php'; ?>
<div id="page">
    <div id="text">
        <?php 
            $Product_Nr = $_GET["id"];

            try {
                $db = new PDO('mysql:host = localhost; dbname=test', 'rijnder', 'GodspeedF#A#');
            } catch(PDOException $ex) {
                die("Something went wrong while connecting to the database!");
            }


            $productenSql = 'SELECT * FROM Test WHERE ProductID=?';
            $stmt = $db->prepare($productenSql);
            $stmt->bindValue(1, $Product_Nr, PDO::PARAM_INT); 
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row){

                echo "<div class='productVak'>";
        
                    echo "<h1>".$row['ProductNaam']."</h1>";
        
                    echo "<div class='afbeeldingsVak'>";
                        echo'<img src="images/' . $row["Afbeelding"] . '" alt="' . $row["ProductNaam"] . '"></img>'; 

                        echo "<p> &#128; ". $row['Prijs']. "</p>";
    
                    echo "</div>";
    
                    echo "<div class='beschrijvingsVak'>";
                        echo "<h3>Beschrijving </h3>";
                        echo "<p>".$row['SecundaireInfo']."</p>";
                        echo "<button type='button'> <a class='actieKnop' href='Winkelmandje.php'>Bestellen</a> </button>";
                        echo "<button type='button'> <a class='actieKnop' href='Verlanglijstje.php'>Voeg Toe Aan Verlanglijstje</a> </button>";
                    echo "</div>";
        
                echo "</div>";
        
                echo "<hr>";
        
                echo "<div class='informatieVak'>";
        
                    echo "<div class='tekstVak'>";
                        echo "<h3>Specificaties</h3>";
                        echo "<p> <b> . </b> </p> ";
                    echo "</div>";
            
        
                    echo "<div class='tekstVak'>";
                        echo "<h3> Recencies</h3>";
        
                        echo "<h4 class='tekstKop'>Barry- 07-01-15: </h4> ";
                        echo "<p>De eerste keer dat ik dit mirakel las, was het een bewolkte oktoberdag in 2008. Dit boek, dit aanminnig moraal, dit godswerk hielp me over m'n bindingsangst. Donec sed odio dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>";
                    echo "</div> ";
        
        
                    echo "<form method='' action='' >";
                        echo "<h4 class='tekstKop'>Naam</h4>";
                        echo "<input type='text' name='naam'> ";
                        echo "<h4 class='tekstKop'>Recensie</h4>";
                        echo "<textarea style='' float:none;' name='comment' cols='50' rows='10'></textarea>";
                        echo "<input style='margin-top:10px' type='submit' value='Recensie plaatsen'/>";
                    echo "</form>";
            echo "</div>";
            }

        ?>
        
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>