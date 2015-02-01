<!DOCTYPE html>
<html>
    <head>
        <title>Welkom bij Barry's Bakery - Barry's Bakery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

    <style>
    
/* A slide show element on the top of the page that holds all the slideshow contents  */
    .afbeeldingKop
    {
        min-width: 33%;
        width:38%;
        max-width: 41%;
        min-height:68%;
        max-height: 79%;
        height: auto;
        border-color:green;
        text-align: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
        overflow:hidden;
        position: absolute;
        top:-5%; 
        margin-top:23%;
        margin-bottom:15%;
        border-color:red;
        min-height:300px;
        height:70%;
        z-index:20;
        left: 0;
        right: 0;

    }
      
    /* The cropped background image  in the slideshow */
    .achtergrondVak
    {
        text-align: center;
        background-size: 150% 180%;
        background-repeat: no-repeat;
        background-position: left top;
        background-image: url(images/Martijns-Traktatie.jpg);
        z-index: 10;
        display: block;
        -webkit-filter: blur(85px);
        filter: blur(85px);
        -moz-filter: blur(85px);
        -o-filter: blur(85px);
        -ms-filter: blur(100px); 
        overflow:hidden;
        vertical-align: bottom;
        border-color:green;
        min-width:380px;
        max-width:420px;
        min-height:42.5%;
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;

    }

    /* Dividing horizontal line */
    .horizontalLine
    {
        top:150%;
        min-width:300px;
        margin-left: 10%;
        margin-right: 10%;
        margin-top:10%;
        overflow:hidden;
    }
    /* The product of the slide show. The prodyucts are positioned on top of each other within the afbeelding kop by giving them an absolute positioning/  */ 
    .productVak
    {
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        top: 4%;
        left: 0;
        right: 0;
        z-index: 20;
   }

    .productVak img
    {
        box-shadow: 0px 0px 40px 6px rgba(14,14,14,0.4);
        min-height: 160px;
        max-height: 270px;
        min-width: 180px;
        max-width: 240px;
        overflow:hidden;

    }

    /* The text that belongs to the product showed in the slideshow */
    .tekstNieuwProduct
    {
        text-transform: uppercase;
        z-index: 20;
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        font-weight:lighter;
        font-size:160%;
        margin-left:-12%;
        position: absolute;
        top:27.4%;
        margin-top:5%;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        color:white;
        text-align:center;
    }

    /* Displays the text on top of the homepage */
    .homePageHeader h1
    {
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        position:absolute;
        text-align:center;
        color:#4b3832;
        top:6.3%;
        margin-bottom: 3%;
        margin-top:1%;
    }
    /* Because everything within afbeeldingkop is absolute positioned, these objects don't push away all of the stuff on top of page. This means they don't get any free space to stay. This class without any further content pushes the dividing line and the top of content away from each other, so that the afbeeldinkop can fit in */ 
    .spacer
    {
        margin-top:55%;
        height: 50%;
        margin-bottom:6.5%;      
        position:relative;
    }

    .productRij h2 
    {
        color:#4b3832;
        margin-bottom: 10px;
    }
    /* A container for a row of products positioned next to each other */
    .productRij
    {
        z-index:20;
        margin-left:15%;
        margin-right:15%;
        margin-bottom:3%;
        width:70%;
        display: inline-block;
    }
    /* Styling for the actual products in the product row */
    .productRijProducten
    {
        z-index:10;
        padding:15px;
        box-shadow: inset 0px 0px 8px -0.05px rgba(12,12,12,0.5);
        background-color: #e5dbcf;
        height: 170px;
        overflow-x: scroll;
        overflow-y: hidden;
        max-width: 1500px;
        white-space: nowrap;
    }
    /* A product in a product row */
    .product
    { 
        z-index:-10;
        vertical-align: middle;
        margin-top:auto;
        margin-bottom:auto;
        border-color: #E1E1E1;
        text-align:center;
        margin-left: 25px;
        display: inline-block;
    }

    .product img
    {
        width:auto;
        height:90px;
    }
    /* The text beneath a product in a product row */
    .productBeschrijving
    {
        display:block;
        color:#4b3832;
        font-size:100%;
    }

    </style>

    </head>

    <body>

        <?php
            include "menu.php";

            # functie voor de overbodige nullen includen
                include 'TrimLeadingZeroes.php';
            #$db = new PDO('mysql:host = localhost; dbname=test', 'rijnder', 'GodspeedF#A#');
        ?>

    <div id="text">

        <div class="spacer">

        </div>    

        <div class="homePageHeader">
            <h1 > NIEUWE PRODUCTEN </h1>
        </div>
        <?php include 'nieuwe_producten.php'; ?>



        <div class="horizontalLine">
        <hr>
        </div> 

        <div class="productRij">

            <h2 > POPULAIR </h2>

            <div class="productRijProducten">
            
                <?php include 'populaire_producten.php'; ?>
               
            </div>
        </div>


        <div class="productRij">          
            <h2> AANBIEDINGEN </h2>
            <div class="productRijProducten"> 

            <?php 
            
            $productenAanbiedingSql = "SELECT Product_ID ,Productnaam, Aanbieding, img_filepath FROM Product  WHERE Aanbieding != 0 LIMIT 5" ;
            $stmt = $db->prepare($productenAanbiedingSql); 
            $stmt->execute();

            while($row =$stmt->fetch() )
            {

                echo '<a href="ProductPagina.php?id='.$row["Product_ID"].'">';
                echo '<div class="product"   onclick="location.href=\'ProductPagina.php?id='.$row["Product_ID"] . '\';">';
                echo '<div class="productAfbeelding">';
                echo '<img src="images/' . $row["img_filepath"]. '" alt="' . $row["Productnaam"] . '"> </img>';
                echo '</div>';
                echo '<div class="productBeschrijving">';
                echo '<p> ' . $row["Productnaam"] . '<br> &euro;' . trimLeadingZeroes($row["Aanbieding"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
            ?>
    
              
            </div>
        </div>


        <div class="productRij"> 
            <h2 > CATEGORIE&Euml;N </h2>
            <div class="productRijProducten">

            <?php
            $categorieSql = "SELECT Categorie, img_filepath FROM Product GROUP BY Categorie LIMIT 5" ;
            $stmt = $db->prepare($categorieSql); 
            $stmt->execute();
            while($row =$stmt->fetch() )
            {
                echo '<a href="productCatalogus.php?categorie='.$row["Categorie"].'">';
                echo '<div class="product">';
                echo '<div class="productAfbeelding">';
                echo '<img src="images/' . $row["img_filepath"] . '" alt="' . $row["Categorie"]. '"> </img>';
                echo '</div>';
                echo '<div class="productBeschrijving">';
                echo '<p>' . $row["Categorie"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }

            $db = NULL;
            ?>

                
             </div>
        </div>

        </div>
        
<?php include 'footer.php'; ?>
        
    </body>

    <script type="text/javascript">

    // All of the slideshow containers.    
    var koppen = [document.getElementById("afbeeldingKop0"),
    document.getElementById("afbeeldingKop1"),
    document.getElementById("afbeeldingKop2")];

    clearStyles(koppen);



    slideShow();

    var j = 0;
    
    function slideShow()
    {
        var timer1 = setInterval(function(){displaySlides(koppen);}, 4700);
    }

    /* Function that displays all the slides */
    function displaySlides(images)
    {
        document.getElementById("afbeeldingKop" + (j + 1) % images.length).style.display = "block";
        changeSlide(images[j % images.length], images[(j + 1) % images.length]);    
        j++;
    }

    /* remove any opictaty on elements found in an array */

    function transition(delay, image1, image2)
    {


        changeSlide(image1, image2);
    }

    function clearStyles(images)
    {
        images[0].style.opacity = 1; 
        for(i = 1; i < images.length; i++)
        {
            images[i].style.opacity = 0; 
        }
    }

    function changeSlide(image1, image2) 
    {
    var op1 = 1;
    var op2 = 0;
    var timer = setInterval(
        function () {
            // Fade out
            if (op1 <= 0)
            {
                console.log("Yeah!");
                clearInterval(timer);
                image1.style.opacity = 0;
                document.getElementById("afbeeldingKop" + (j-1) % koppen.length).style.display = "none";
                return;

            }
            image1.style.opacity = op1;
            image1.style.filter = 'alpha(opacity=' + op1 * 100 + ")";
            op1 -= 0.1;

            // Fade in
            if (op2 >= 1)
            {
                image2.style.opacity = 1;
                clearInterval(timer);
                return;

            }
            image2.style.opacity = op2;
            image2.style.filter = 'alpha(opacity=' + op2 * 100 + ")";
            op2 += 0.1; 


        }, 50);

    }
    



    </script>
    

    
</html>

