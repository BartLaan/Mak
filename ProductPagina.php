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

h1.sansserif {
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

.content
{
    margin-left: 10%;
    margin-right:10%;
}

.productVak
{
    position:relative;
    float: left;
    border-color:blue;
    margin-top:
    color: black;
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
    width:20%;
    min-height:20%;
    max-height:30%;
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
                echo $row['ProductID'].' '.$row['SecundaireInfo'].' '.$row['Afbeelding']; 
            }

        ?>
        <div class="content">

            <div class="productVak">
            
                <h1 class="sansserif"> Product </h1>
            
                <div class="afbeeldingsVak">
                    <img src="Images/Martijns-Traktatie.jpg" alt="Product" >
                    <p style="text-align:center"> &#128; 24,99</p>
            
                </div>
            
                <div class="beschrijvingsVak">
                    <h3>Beschrijving </h3>
                    <p>Uit klinisch onderzoek is gebleken dat deze taart heel lekker is als je op een schommel zit, maar ook als je niet op een schommel zit.</p>
                    <button type="button" > <a class="actieKnop"href="Winkelmandje.html">Bestellen</a> </button>
                    <button type="button" > <a class="actieKnop" href="/Verlanglijstje.html">Voeg Toe Aan Verlanglijstje</a> </button>
                    <p> Grootte selecteren </p>
                    <select>
                        <option value="9 inch">9 inch</option>
                        <option value="11 inch" selected>11 ich</option>
                        <option value="13 inch">13 inch</option>
                        <option value="15 inch">15 inch</option>
                    </select>
                </div>
            
            </div>
            
            <hr>
            
            <div class="informatieVak">
            
                <div class="tekstVak">
                <h3>Specificaties</h3>
                <p> <b> . </b> </p> 
                </div>
                
            
                <div class="tekstVak">
                <h3> Recencies</h3>
            
                <h4 class="tekstKop">Barry- 07-01-15: </h4> 
                <p>De eerste keer dat ik dit mirakel las, was het een bewolkte oktoberdag in 2008. Dit boek, dit aanminnig moraal, dit godswerk hielp me over m'n bindingsangst. Donec sed odio dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div> 
            
            
                <form method="" action="">
                    <h4 class="tekstKop">Naam</h4>
                    <input type="text" name="naam"> 
                    <h4 class="tekstKop">Recensie</h4>
                    <textarea style=" float:none;" name="comment" cols="50" rows="10"></textarea>
                </form>
                <input style="margin-top:10px" type="submit" value="Recensie plaatsen"/>
            
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>

</html>