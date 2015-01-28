<!DOCTYPE html>
<html>
<head>

	<title>Barry's Bakery - Over ons</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
    <style>

     table td
    {
        padding-right:20px;
    }

    table a
    {
        color: black;
        font-style: bold;
    }

    h1.about, p.about
    {
        color: black;
    }    

    .paginaSectie
    {
        padding:5%;
        padding-right:-3%;
        margin-top: 5%;
        background-color: #fff4e6;
        border-radius:10px;
        border: solid #854442;
    }
    
    .paginaPeople {
        margin-top: 5%;
        padding-bottom: 5%;
        background-color: #fff4e6;
        border-radius:10px;
        border: solid #854442;
        text-align: center;
    }

    table.people {
        width: 100%;         
    }

    table.people td {
        width: 50%;
        padding: 10px;
    }

    .persoon
    {
        margin: 1%;
        padding:5%;
        border-radius: 10px;
        background-color: #854442;
        position:relative;
        overflow: hidden; 
        text-align: left;

    }

    .beschrijving
    {
        color:  white;
        float: left;
        position: relative;
        width: 60%;
    }

    .beschrijving p
    {
        font-style: italic;
    }


    .teamFoto
    {
        width:25%;
        position: relative;
        float:right;

    }

    .teamFoto img
    {
        border: solid;
        border-radius:10px;
        border-color: #854442;
        width: 100%;
        height: 100%;
    }

    </style> 
        
</head>	

<body>
    <?php include 'menu.php'; ?>
    <div id="page">
         <div id="text">
            <div class="paginaSectie">
                <h1 class="about"> Barry's verhaal:</h1>
                    Barry is begonnen met bakken toen hij 4 was. Op een dag verveelde hij zich en zijn moeder had toevallig bakspullen op tafel laten staan. Hij ging aan de slag en creeerde dit mirakel:
                <br />
                <img src="images/pokemontaart.jpeg"; alt="Pikachutaart"; title="Mirakel"; style="width:80%; height:80%">
                <br />
                    Op zijn 7e won hij zijn eerste bakwedstrijd met een taart in de vorm van de Eiffeltoren. Dit heeft hij bereikt door innovatieve taartbaktechnieken te gebruiken. 
                    Hij bleef zijn talenten doorontwikkelen en sinds 2007 heeft Barry een eigen bakkerij. Concurrenten maakten geen schijn van kans, en zijn bakkerij heeft meerdere prijzen gewonnen. 
            </div>
            <div class="paginaSectie">
              	<h1 class="about"> Over  M A K</h1>
            	<p class="about">Deze website is het resultaat van de gezamenlijke inspanningen van studenten aan de Universiteit van Amsterdam. <br> <br> Voor het vak Webprogrammeren en Databases moesten zij 
                een website maken, en als je dit ziet is dat in ieder geval gedeeltelijk gelukt. Zij konden hiervoor uit een aantal categorie&euml;n kiezen met betrekking tot website soorten, en zij kozen voor het ontwikkelen van een webshop.  
                
                <br> <br>
            	Het doel van de website is het verkopen van gebak in een webshopomgeving. We wensen je veel plezier bij het bekijken van onze website!
            	</p>
            
            </div>
            <div class="paginaPeople">    
	            <h1 class ="about"> Het Team </h1>
                <table class="people">
                    <tr>
                        <td>
                            <div class="persoon">
                                <div class="beschrijving">
                                  	<h3> Simon </h3>
                                  	<p> Simon kan heel goed mooie plaatjes maken met photoshop en kan niet wachten om aan de slag te gaan. </p>
                                </div>
                                <div class="teamFoto">
                                    <img src="images/Mensen/Simon.jpg" alt="Simon" title = "Simon"></img>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="persoon">
                                <div class="beschrijving">
            	                   <h3> Bart </h3>
        		                   <p> Bart schrijft dit stukje en gebruikt dat voordeel om zijn genialiteit aan te kaarten. Bij dezen. Bart is GE-NI-AAL. </p>
                                </div>
                                <div class="teamFoto">
                                    <img src="images/Mensen/Bart.jpg" alt="Bart" title = "Bart"></img>
                                </div>
                            </div>  
                        </td>
                    </tr>
                    <tr>
                        <td>                  
                            <div class="persoon">                    
                                <div class="beschrijving">
                            	   <h3> Rijnder </h3>
                            	   <p> Rijnder is een beetje gek en heeft een diepgaande liefde voor Geert Mak. </p>
                                </div>                
                                <div class="teamFoto">
                                    <img src="images/Mensen/Rijnder.jpg" alt="Rijnder" title = "Rijnder"></img>
                                </div>                
                            </div>
                        </td>
                        <td>
                            <div class="persoon">                
                                <div class = "beschrijving">
                            	   <h3>Barry </h3>
                            	   <p>
                                    Barry is een hele gewone, normale, aardige en melige jongen. Hij heeft blond haar.
                            	   </p>
                                </div>                
                                <div class="teamFoto">
                                    <img src="images/Mensen/Barry.jpg" alt="Barry" title = "Barry"></img>
                                </div>                
                            </div>      
                        </td>
                    </tr>
                    <tr>
                        <td>          
                            <div class="persoon">                
                                <div class = "beschrijving">
                    	           <h3> Caitlin </h3>
                        	       <p> Caitlin heeft heel veel verstand van html. </p>
                                </div>                
                                <div class="teamFoto">
                                    <img src="images/Mensen/Caitlin.jpg" alt="Cailtin" title = "Caitlin"></img>
                                </div>                
                            </div>
                        </td>
                        <td>
                            <div class ="persoon">                
                                <div class="beschrijving">
                                    <h3> Martijn </h3>
                        	        <p> Martijn weet niet waarom het niet werkt. </p>
                                </div>                
                                <div class="teamFoto">
                                    <img src="images/Mensen/Martijn.jpg" alt="Martijn" title = "Martijn"></img>
                                </div>                
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
	</body>
</html>