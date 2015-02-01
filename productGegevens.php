<!DOCTYPE html>
<html>
<head>
    <title>Productgegevens - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
    <link href="klantenBeheren.css" rel="stylesheet" type="text/css" />

    <style>

        .gebruikerGegevensVeld
        {
            height:40%;
            width:55%;
            background-color: #E9E9E9;
            overflow: hidden;
            text-align: left;
            width:48%;
            margin: 5%;
            margin-bottom:3%;
        }

        .informatieVeld
        {
            margin-top:1%;
            margin-bottom:1%;
            width:23%;
            display:inline-block;
            color: #a9a9a9;
            
        }
        
        .informatieKop
        {
            color: #a9a9a9;
            text-align:left;
            margin-bottom:1%;

        }

        .informatieVeld input[type = "text"] 
        {
            border:none;
            width:100%;
            color: #a9a9a9;
            background-color: transparent;
        }
    
       /* .informatieVeld input[type = "text"]:focus 
        {
            color: #a9a9a9;
            outline: none;
        }*/
        
        .wachtwoordVeld
        {
            margin-bottom:4%;
        }
    /* oneven rijen */
        .informatieRij1
        {
            border-top: 1px solid #854442;
            border-right: 1px solid #854442;
            padding-top:3%;
            padding-bottom:3%;
            min-height:8%;
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color: #F9F9F9;
            vertical-align: center;
        }
    /* even rijen */
        .informatieRij2  
        {
            border-top: 1px solid #854442;
            border-right: 1px solid #854442;
            padding-top:3%;
            padding-bottom:3%;   
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color:#E9E9E9;
            vertical-align: center;
        }
    /* onderste informatierij */
        .informatieRijOnder
        {
            border-top: 1px solid #854442;
            border-right: 1px solid #854442;
            border-bottom: 1px solid #854442;
            padding-top:3%;
            padding-bottom:3%;
            min-height:8%;
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color: #E9E9E9;
            vertical-align: center;
        }
        .inputValidateBox
        {
            vertical-align: center;
            display:inline-block;
            width:40%;
            margin-left:-20%;
            position:relative;
            float:right;
            margin-top:-0.5%;
            
        }

        .inputAfbeelding
        {
            display:inline-block;
            vertical-align:middle;
            height:17px;
            width:17px;

        }

        .inputTekstGoed
        {
            vertical-align: middle;
            font-size:75%;
            color:#5ad75a;
            display:inline-block;


        }

        .inputTekstFout
        {
            color:#e18484;
            font-size:75%;
            display:inline-block;
        }
        </style>

</head>
<body>

<?php include 'menu.php' ?>


<div id='page'>
<div id='text'>
<?php
# functie voor de overbodige nullen includen
include 'TrimLeadingZeroes.php';

# check of er een id meegegeven wordt
if (!isset($_GET['id'])) {
    echo "Geen product gespecificeerd.";
} else {
    # check of de administrator ingelogd is
    if (isset($_SESSION['Klant_ID'])) {
        $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $admin = $stmt->fetch(); 
    } else {
        echo 'U bent niet gemachtigd om deze pagina te bekijken. Log in als administrator om verder te gaan.';
        echo '<form action="log_in.php" method="POST">
            <input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
            <input type="submit" value="Inloggen"> <br><br><br>
            </form>';
    }
    if (isset($_SESSION['Klant_ID']) && $admin && strlen($admin["Emailadres"]) > "0") {
        $informatijRijIterator = 0;
    
        
        $productInfoQuery = 'SELECT Productnaam, Categorie, Prijs, Voorraad, Beschrijving, Gewicht, img_filpath, Aanbieding, SecundaireInfo, Toevoegingsdatum FROM Product WHERE Product_ID ="' . $_GET['id'] . '"';
        $stmt = $db->prepare($productInfoQuery);
        $stmt->execute();
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($resultArray as $results)
        {
            foreach($results as $key => $value)
            {      
                echo $key;
                echo $value;
                echo '<div class="informatieRij' . $informatieRijSoort . '">';
                    echo '<div class="informatieVeld">';
                        echo '<input id="' . $key . '" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value . '">';
                    echo '</div>';
                    echo '<div class="inputValidateBox">';
                        echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                    echo '</div>';
                echo '</div>';
                $informatijRijIterator++;
            }
    
        }
    } elseif (isset($_SESSION['Klant_ID']) ) {
        echo "U bent niet gemachtigd om deze pagina te bekijken.";
    }
}
?>
            
</div>
</div>

<script type="text/javascript" src="productAanpassen.js"></script>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>