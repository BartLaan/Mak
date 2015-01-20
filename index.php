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
        -webkit-animation-name: fadeout;
        -webkit-animation-duration: 1.5s;
        -webkit-animation-timing-function: ease-out;
        -webkit-animation-delay: 5s;
        -webkit-animation-iteration-count:infinite;

    }
      

    /* @-webkit-keyframes fadeout */
    {
        0%   {left: 50px; opacity:1}
        
        100% {left: 100px; opacity:0.1;}
    }

    achtergrondVak:nth-child(1) 
    {
    
       animation: fadeout 15s 10s infinite;
    }

    achtergrondVak:nth-child(2) 
    {
    
       animation: fadeout 15s 5s infinite;
    }

    achtergrondVak:nth-child(3) 
    {
    
       animation: fadeout 15s 0s infinite;
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
        position: absolute;
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
                <img src="images/Martijns-Traktatie.jpg" style="opacity: 0.2" alt="productAfbeelding"> </img>
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

        <div class="afbeeldingKop" style="margin-top:-48%;" id="afbeeldingKop3">
            <div class="achtergrondVak" style="background-image: url(images/Taart4.jpg);">

            </div>

 

            <div class="productVak" >
            <img src="images/Taart4.jpg" alt="productAfbeelding"> </img>
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>BARRY'S Citroen TAART </i> <br> <span style="font-style:bold"> &euro; 10,75 </span> </p>
            </div>
        </div>
           

        <script type="text/javascript">
//        
//        var listElement = document.getElementById("afbeeldingKop3");
//
//        listElement.style.opacity = 0.1;
//
//        alert(listElement.style.opacity);



        </script>


        <script type="text/javascript">

        slideShow(getAfbeeldingKoppen());

        function getAfbeeldingKoppen()
        {
            return "";
        }

        function slideShow(koppen)
        {
            var kop1 = document.getElementById("afbeeldingKop1");
            var kop2 = document.getElementById("afbeeldingKop2");
            var kop3 = document.getElementById("afbeeldingKop3");

            var afbeeldingKoppen = [kop1, kop2, kop3];

            // while(true)
            for(i = 0; i < afbeeldingKoppen.length; i++)
            {
                afbeeldingKoppen[i].style.opacity = 1;
                displayImage(5);
                if(i == afbeeldingKoppen.length-1)
                {
                    fade(afbeeldingKoppen[i], afbeeldingKoppen[0]);
                }
                else
                {
                    fade(afbeeldingKoppen[i], afbeeldingKoppen[i+1]);
                }
            }
                
        }

        function displayImage(seconds)
        {
            while(seconds > 0)
            {
                setInterval(function() {;}, 1000);
                seconds--;
            }
        }

        function fade(image1, image2)
        {   
            for(i = 0; i < 2; i += 0.4)
            {
                setInterval(lowerTransparency(image1, 0.1), 400);
                setInterval(higherTransparency(image2, 0.1), 400);
            }
            
        }

        function lowerTransparency(image, interval)
        {
            var imageOpacity = image.style.opacity;
            image.style.opacity= imageOpacity - interval; 
        }

        function higherTransparency(image, interval)
        {
            var imageOpacity = image.style.opacity;
            image.style.opacity= imageOpacity + interval; 
        }

        </script>

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
    
    

    
</html>


