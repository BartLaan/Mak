<!DOCTYPE html>
<html>
	<head>
		<title>Mak - Welkom bij Mak</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

    <style>
    

    .afbeeldingKop
    {
        width: 40%;
        min-height:60%;
        max-height: 70%;
        border-color:green;
        text-align: center;
        display: block;
        margin-left: 30%;
        margin-right: 30%;
        min-width:320px;
        overflow:hidden;
        position: relative;
        top:-10%;
        border-color:red;
        min-height:300px;
        height:485px;
        z-index:20;
    }
      



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
        -ms-filter: blur(85px);
        overflow:hidden;
        vertical-align: bottom;
        border-color:red;
        min-width:500px;
        min-height:300px;
        height:485px;
        position: relative;
    }


    .horizontalLine
    {
        top:150%;
        min-width:300px;
        margin-left: 10%;
        margin-right: 10%;
        overflow:hidden;
    }

    .productVak
    {
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        top: 12.5%;
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


    .tekstNieuwProduct
    {
        text-transform: uppercase;
        z-index: 20;
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        font-weight:lighter;
        font-size:160%;
        margin-left:-12%;
        position: absolute;
        top:72%;
        left:49%;   
        margin-top:5%;
        margin-left: auto;
        margin-right: auto;
        margin-top: auto;
        margin-bottom: auto;
        bottom: 20%;
        left: 0;
        right: 0;
        color:white;
        text-align:center;
    }


    .homePageHeader h1 
    {
        margin-top: 5%;
        color:#4b3832;

    }

    .productRij h2 
    {
        color:#4b3832;
        margin-bottom: 10px;
    }

    .productRij
    {
        z-index:20;
        margin-left:15%;
        margin-right:15%;
        margin-bottom:3%;
        width:70%;
        display: inline-block;
    }

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
           $db = new PDO('mysql:host = localhost; dbname=test', 'rijnder', 'GodspeedF#A#');
        ?>

    <div id="text">
        <div class="homePageHeader">
            <h1 style="text-align:center;"  > NIEUWE PRODUCTEN </h1>
        </div>


        <div class="afbeeldingKop" id="afbeeldingKop1">
            <div class="achtergrondVak" >

            </div>

            <div class="productVak">
                <img src="images/Martijns-Traktatie.jpg"  alt="productAfbeelding"> </img>
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>BARRY'S AARDBEIEN TAART </i> <br> <span style="font-style:bold"> &euro; 9,75 </span> </p>
            </div>
        </div>

            <div class="afbeeldingKop" style="margin-top:-48%;" id="afbeeldingKop2" >
            <div class="achtergrondVak" style="background-image: url(images/Taart2.jpg);">

            </div>

            <div class="productVak" >
            <img src="images/Taart2.jpg" alt="productAfbeelding"> </img>
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>BARRY'S Kersen TAART </i> <br> <span style="font-style:bold"> &euro; 10,75 </span> </p>
            </div>
        </div>

        <div class="afbeeldingKop" style="margin-top:-48%; " id="afbeeldingKop3">
            <div class="achtergrondVak" style="background-image: url(images/Taart4.jpg);">

            </div>

            <div class="productVak" >
            <img src="images/Taart4.jpg" alt="productAfbeelding"> </img>
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>BARRY'S Citroen TAART </i> <br> <span style="font-style:bold"> &euro; 10,75 </span> </p>
            </div>
        </div>


        <div class="horizontalLine">
        <hr>
        </div> 

        <div class="productRij">

            <h2 > POPULAIR </h2>

            <div class="productRijProducten">
            
                <div class="product">
                    <div class="productAfbeelding">
                        <img   src="images/Bakkerij/RoseCupcakes.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Rozen Cupcake <br> &euro;100,-</p>
                    </div>
                </div>
               
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/Croisants.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Croisant <br> &euro;2,50</p>
                    </div>
                </div>
    
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/GeertMak.jpg" alt="productAfbeelding"> </img>
                    </div>

                    <div class="productBeschrijving">
                            <p> Geert Mak <br> &euro;1000,92</p>
                    </div>
                </div>
    
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/Taart.png" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Mooie taart <br> &euro;1,05</p>
                    </div>
                </div>
    
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/Bumblebee.png" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Mooie taart [2] <br> &euro;2,05</p>
                    </div>
                </div>
    
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/MarioParty.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Wow <br> &euro;125,0</p>
                    </div>
                </div>
    
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/Tomboy.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Erg mooi! <br> &euro;125,0</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="productRij">          
            <h2> AANBIEDINGEN </h2>
            <div class="productRijProducten"> 

            <?php 
            
            $productenAanbiedingSql = "SELECT ProductNaam, Aanbieding, Afbeelding FROM Test  WHERE Aanbieding != 0 LIMIT 5" ;
            $stmt = $db->prepare($productenAanbiedingSql); 
            $stmt->execute();

            while($row =$stmt->fetch() )
            {

                echo '<div class="product">';
                    echo '<div class="productAfbeelding">';
                        echo '<img src="images/' . $row["Afbeelding"]. '" alt="' . $row["ProductNaam"] . '"> </img>';
                    echo '</div>';
                    echo '<div class="productBeschrijving">';
                        echo '<p> ' . $row["ProductNaam"] . '<br> &euro;' . $row["Aanbieding"] . '</p>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
    
                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/GeertMak.jpg" alt="productAfbeelding"> </img>
                    </div>
                        <div class="productBeschrijving">
                            <p> Geert Mak <br> &euro;1000,92</p>
                        </div>
                </div>
            </div>
        </div>


        <div class="productRij"> 
            <h2 > CATOGORIE&Euml;N </h2>
            <div class="productRijProducten">

            <?php
            $categorieSql = "SELECT Categorie, Afbeelding FROM Test GROUP BY Categorie LIMIT 5" ;
            $stmt = $db->prepare($categorieSql); 
            $stmt->execute();
            while($row =$stmt->fetch() )
            {
                echo '<div class="product">';
                echo '<div class="productAfbeelding">';
                echo '<img src="images/' . $row["Afbeelding"] . '" alt="' . $row["Categorie"]. '"> </img>';
                echo '</div>';
                echo '<div class="productBeschrijving">';
                echo '<p>' . $row["Categorie"] . '</p>';
                echo '</div>';
                echo '</div>';
            }

            $db = NULL;
            ?>

                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/RoseCupcakes.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> CUPCAKES </p>
                    </div>
                </div>
                

                <div class="product">
                    <div class="productAfbeelding">
                        <img src="images/Bakkerij/GeertMak2.jpg" alt="productAfbeelding"> </img>
                    </div>
                        <div class="productBeschrijving">
                            <p> GEERT MAK</p>
                        </div>
                </div>
             </div>
        </div>

        </div>
        
<?php include 'footer.php'; ?>

    </body>

    <script type="text/javascript">

    var koppen = [document.getElementById("afbeeldingKop1"),
    document.getElementById("afbeeldingKop2"),
    document.getElementById("afbeeldingKop3")];
//    slideShow(koppen);

    clearStyles(koppen);
//    changeSlide(document.getElementById("afbeeldingKop2"),
//    document.getElementById("afbeeldingKop3"));


    slideShow();

    var j = 0;
    
    function slideShow()
    {
        var timer1 = setInterval(function(){displaySlides(koppen);}, 7000);
    }

    /* Function that displays all the slides */
    function displaySlides(images)
    {
        console.log(j % images.length);
        changeSlide(images[j % images.length], images[(j + 1) % images.length]);    
        j++;
    }



    function transition(delay, image1, image2)
    {

        // Delay is the time in seconds before the transition occurs
//        setTimeout(function(){changeSlide(image1, image2)}, delay * 1000);
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
                return;

            }
            image1.style.opacity = op1;
            image1.style.filter = 'alpha(opacity=' + op1 * 100 + ")";
            op1 -= 0.04;

            // Fade in
            if (op2 >= 1)
            {
                image2.style.opacity = 1;
                clearInterval(timer);
                return;

            }
            image2.style.opacity = op2;
            image2.style.filter = 'alpha(opacity=' + op2 * 100 + ")";
            op2 += 0.04; 


        }, 55);

    }

    //    function displaySlides(images)
    //    {
    //        
    //
    //        for(i = 0; i < images.length; i++)
    //        {
    //            var delayTime = 5;
    //            if(i == images.length - 1)
    //            {
    //                changeSlide(images[i], images[0]);
    //                console.log("Yeah1 j:" + j + " i: " + i);
    //
    //            }
    //            else
    //            {
    //                changeSlide(images[i], images[i + 1]);
    //                console.log("Yeah2 j:" + j + " i: " + i);
    //
    //            }
    //        }
    //        j--;
    //        console.log(j);
    //    }

    
    



    </script>
    

    
</html>


