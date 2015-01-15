<!DOCTYPE html>
<html>
<head>
	<title>Mak - Wonkelwagen</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="/home/bart/Git/Mak/css-button.css" type="text/css" />
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

    <style>

    h1 {
        text-align: center;
    }
    td
    {
        padding:10px;
        margin:5px;
    }

    tr:nth-child(even) 
    {
        background-color: #F9F9F9;
    }

    tr:nth-child(odd) 
    {
        background-color: white;
    }

    .underTable /* Alle content onder de bestellingsTabel */
    {

    }

    .bestellingsInformatie
    {
        position: relative;
        text-align: right;
    }

    .updateKnop
    {
        margin: auto;
        text-align: center;
        border:  1px solid black;
        width: 20%;
    }

    </style>
        
</head>

<body>
    <!-- Problemen:  
    1. Knoppen voor "op voorraad" en "verwijder" staan niet in het midden
    2. Afreken knop is raar gepositioneerd (ik (rijnder) heb hem daar neergezet met een het absolute property als een tijdelijk work-around)
    -->
    <?php include 'menu.php'; ?>
        <div id="page">
           <div id="text">
            	<h1>Winkelwagen</h1>
            	<table>
            		<tr>
            			<th>Aantal</th>
            			<th></th>
            			<th>Artikel</th>
            			<th>Voorraad</th>
            			<th>Prijs</th>
            			<th>Verwijder</th>
            		</tr>
            		<tr>
            			<td ><form><input type="number" name="aantal" min="1" ></form></td>
            			<td> <img src="Images/Mak_Geschiedenis_Adam.jpg" alt="Een Kleine Geschiedenis van Amsterdam"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"><img></td>
            			<td>Mak, G. - Een Kleine Geschiedenis van Amsterdam</td>
            			<td><img src="Images/Op_Voorraad.gif" alt="Op voorraad" style=" margin-left: 45%; margin-right: 45%;" </td>
            			<td>&#8364 299,99</td>
            			<td><a href="#placeholder"> <img src="Images/Verwijder.gif" alt="Verwijder artikel" style=" margin-left: 45%; margin-right: 45%;"> </img> </a> </td>
            		</tr>
                    <tr>
            			<td ><form><input type="number" name="aantal" min="1" ></form></td>
            			<td> <img src="Images/DeBrug.jpg" alt="De Brug"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"><img></td>
            			<td>Mak, G. - De brug </td>
            			<td><img src="Images/Op_Voorraad.gif" alt="Op voorraad" style=" margin-left: 45%; margin-right: 45%;" </td>
            			<td>&#8364 1492,00</td>
            			<td><a href="#placeholder"> <img src="Images/Verwijder.gif" alt="Verwijder artikel" style=" margin-left: 45%; margin-right: 45%;"> </img> </a> </td>
                    </tr>
            	</table>

                <div class="updateKnop">
                    <a href="#" class="button1">Update winkelwagen</a>
                </div>

                <div class="underTable">
                    <div class="bestellingsInformatie">
                    	<p>Subtotaal: &#8364 299,99</p>
                    	<p>Verzending:
                    		<select>
                    			<option value="verzenden">
                    				Verzending met PostNL (&#8364 6,95)</option>
                    			<option value="ophalen">Ophalen (&#8364 0,00)</option>
                    		</select></p>
                    	<p style="color:#666666">Totaal Excl. BTW: &#8364 245,88</p>
                    	<p>Totaal Incl. BTW: &#8364: 306,94</p>
                        <a href="#">Afrekenen</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>