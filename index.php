<!DOCTYPE html>
<html>
	<head>
		<title>Mak - Welkom bij Mak</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
        min-height:300px;
        height:485px;
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
        top:45%;
        left:40%;
        right:60%;        
        z-index: 20;
   }

    .productVak img
    {
        box-shadow: 0px 0px 50px 6px rgba(14,14,14,0.4);
        min-height: 150px;
        max-height: 220x;
        min-width: 220px;
        max-width: 270px;
        overflow:hidden;
    }


    .tekstNieuwProduct
    {
        z-index: 20;
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        font-weight:lighter;
        font-size:160%;
        margin-left:-12%;
        position: absolute;
        top:65%;

        left:49%;   
        margin-top:5%;
     
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

    h1
    {
        margin-top: 8%;
        color:#fff4e6;

    }

    h2
    {
        color:#fff4e6;
        margin-left:12.5%;
        margin-righ:5%;
        margin-bottom: 10px;
    }

    .productRij
    {
        z-index:-10;
        box-shadow: inset 0px 0px 8px -0.05px rgba(12,12,12,0.5);
        background-color: #fff4e6;
        margin-left:11%;
        margin-right:12%;

        height: 150px;
        overflow-x:s croll;
        overflow-y: hidden;
        white-space: nowrap;

        padding: 15px;
        display: inline-block;
        width:75%;
        margin-bottom:3%;
    }

    .product
    { 

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
        color:#ffdeb3;
        font-size:100%;
    }

    </style>

	</head>

    <body>

        <?php
	     echo include "menuPHP.php";
        ?>
               <?php
        $gevonden1=FALSE;
        $gevonden2=FALSE;
        $klopt=FALSE;
        $naam;    
    
        //Verbinden met database
        $mysqli = new mysqli("localhost", "rijnder", "GodspeedF#A#", "Test");
        if (mysqli_connect_errno()) {
        	printf("Connect failed: %s\n", mysqli_connect_error()); 
        	exit();
        }
        
        //Check of gebruiker tot deze cursus behoort
        //We zijn niet wantrouwig: een collegekaartnummer dat voorkomt in onze tabel is goed genoeg
        
        $stmt = $mysqli->prepare("SELECT ProductNaam FROM Test LIMIT 1");
        $stmt->bind_param("s", $naam);
        $stmt->bind_result($naam); 
    
        if (! $stmt->execute()) {printf("MySQL foutbericht: %s\n", $stmt->error); exit();}
        if (! $stmt->fetch() ) {
            ?>
            <h1>Fout</h1>
            <?php print htmlspecialchars($naam); ?>
            <p>  <?php print htmlspecialchars($naam); ?> </p>
            <?php
            exit(); 
        }
        $stmt->free_result()
        ?>



        <h1 style="text-align:center;" > NIEUWE PRODUCTEN </h1> 
        <div class="afbeeldingKop">
            <div class="achtergrondVak">

            </div>
            <div class="productVak">
                <img src="images/Martijns-Traktatie.jpg" alt="productAfbeelding"> </img>
            </div>

            <div class="tekstNieuwProduct">
                <p> <i>BARRY'S AARDBEIEN TAART </i> <br> &euro; 9,75 </p>
            </div>

        </div>
        <div class="horizontalLine">
        <hr>
        </div> 

        <h2> POPULAIR </h2>

        <div class="productRij"> 
            
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

        <h2> AANBIEDINGEN </h2>

        <div class="productRij"> 
            
            
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

                      <div class="product">
                <div class="productAfbeelding">
                    <img src="images/Bakkerij/Tomboy.jpg" alt="productAfbeelding"> </img>
                </div>
                    <div class="productBeschrijving">
                        <p> Erg mooi! <br> &euro;125,0</p>
                    </div>
            </div>

        </div>
        <h2> CATOGORIE&Euml;N </h2>

        <div class="productRij"> 
            
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

        </div>
        

    </body>
</html>