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
        border-color:red;
        min-height:300px;
        height:485px;
        z-index:20;
    }

    .afbeeldingKop figure
    {
       margin: 0;
       position: absolute;
    }

    figure:nth-child(1) 
    {
       animation: xfade 15s 10s infinite;
    }

    figure:nth-child(2) 
    {
       animation: xfade 15s 5s infinite;
    }

    figure:nth-child(3) 
    {
       animation: xfade 15s 0s infinite;
    }
    @keyframes xfade
    {
       0%{
          opacity: 1;
       }
       31.5% {
          opacity:1;
       }
       33.3%{
          opacity: 0;
       }
       98% {
          opacity:0;
       }
       100% {
          opacity:1;
       }
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
        min-width:250px;
        min-height:300px;
        height:485px;
        position: relative;
    }

    .horizontalLine
    {
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
        min-height: 150px;
        max-height: 220x;
        min-width: 220px;
        max-width: 270px;
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

    .achtergrondVak img
    {
        min-width:800px;
        width:700px;
        max-width:100%;
        height:auto;
        margin-bottom: -30%; 
        margin-top: -20%;
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
        ?>

    <div id="text">
        <div class="homePageHeader">
            <h1 style="text-align:center;"  > NIEUWE PRODUCTEN </h1>
        </div>

        <div class="afbeeldingKop">
            <figure>
                <div class="achtergrondVak">
    
                </div>
    
                <div class="productVak">
                    <img src="images/Martijns-Traktatie.jpg" alt="productAfbeelding"> </img>
                </div>
    
                <div class="tekstNieuwProduct">
                    <p> <i>BARRY'S AARDBEIEN TAART </i> <br> <span style="font-style:bold"> &euro; 9,75 </span> </p>
                </div>
            </figure>
            <figure>
                <div class="achtergrondVak">
        
                    </div>
        
                    <div class="productVak">
                        <img src="images/Martijns-Traktatie.jpg" alt="productAfbeelding"> </img>
                    </div>
        
                    <div class="tekstNieuwProduct">
                        <p> <i>BARRY'S Kersen TAART </i> <br> <span style="font-style:bold"> &euro; 120,53 </span> </p>
                    </div>
            </figure>
            <figure>
                <div class="achtergrondVak">
        
                    </div>
        
                    <div class="productVak">
                        <img src="images/Martijns-Traktatie.jpg" alt="productAfbeelding"> </img>
                    </div>
        
                    <div class="tekstNieuwProduct">
                        <p> <i>IDK TAART </i> <br> <span style="font-style:bold"> &euro; 2,75</span> </p>
                    </div>
            </figure>

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
                        <img src="images/Bakkerij/Tomboy.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> Erg mooi! <br> &euro;125,0</p>
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
            <h2 > CATOGORIE&Euml;N </h2>
            <div class="productRijProducten">
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
                        <img src="images/Bakkerij/Broden.jpg" alt="productAfbeelding"> </img>
                    </div>
                    <div class="productBeschrijving">
                        <p> BROOD </p>
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
            </div>
        </div>

        </div>
        
<?php include 'footer.php'; ?>

    </body>
</html>