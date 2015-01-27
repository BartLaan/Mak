<!DOCTYPE html>
<html>
<head>
	<title> Product Beheer</title>

	<style>

    table
    {
        border-bottom:none;
        width:80%;
        float:left;

        
    }
    
	table, th, td {
		border: 1px solid white;
		border-collapse: collapse;
	}

	th,td {
	}

    /* De input & select regels moeten hoe dan ook naar een extern style sheet */

	input[type = "text"] 
    {
        background-color: transparent;
        border: none; 
    }

    table input[type = "text"]:focus 
    {
        outline: none;
    }

    table select
    {
        background-color: transparent;
        border:none;
        box-shadow: none;
        <!--  adding  "-webkit-appearance: none;" might be a good idea to make it compatible with safari, but removes the arrow buttons -->


    }
    
    table select:focus
    {
        outline:none;
    }
    

    table th
    {
        max-width:100%;
        color: black;
        overflow:hidden:

    }
    
    tr:hover
    {
        background-color
    }

    tr:nth-child(even) 
    {
        background-color: #bbc3cc;
    }

    tr:nth-child(odd) 
    {
        background-color: white;
    }

    h4
    {
        font-weight:normal;
    }

    .plusButton
    {
        display:inline-block;
        width:20px;
        height: 20px;
        border: 2px transparent #f5f5f5;
        border-radius: 50%;
        text-decoration:none;
        background: #2A2A2A;
        font-size:100%;
        font-weight:bold;
        text-align:center;
        padding:2.7x;
        line-height:20px;
        overflow: hidden;
    }

    .plusButton:hover 
    {
        background: black;
    }

    .plusButton a
    {
        text-decoration: none;
        color: white;
        margin-left:0;
    }

    .knopRij
    {
        height:5%;
    }

    .verwijderVak
    {
        width:18%;
        float:right;
        border:solid;
        border-color:cyan;
    }

    .laatsteKolomHeader
    {
        margin-top:10px;
        vertical-align: middle;
        line-heigth:50px;
        text-algin:left;
        background:white;
        color:black;
        width:27%;
    }
    
    .laatsteKolom
    {
        vertical-align: middle;
        font-size: 80%;
        border:none;
        border-right:none;
        background:white;
        color:#989898;
        font-style:italic;
        text-align:left;
    }

    .rijToevoegen
    {
        display: table-cell;
        vertical-align: center;

    }

    .rijToevoegen .plusButton
    {
        vertical-align: bottom;
        margin-right:1.5%;
        float:left;

    }

    .rijToevoegen p
    {
        white-space: nowrap;
        margin-top:12px;
    }

    .omschrijving
    {
        border:none;
        width:100%;
        text-align:left;
        font-weight:normal;
        font-style:none;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        height:16.5px;
        -webkit-box-orient: vertical;
        overflow:hidden;

    }

    .omschrijving p
    {
        margin-top:0.5%;
        border:none;
    }

    .tabelHulpmiddelen
    {
		clear:both;
    }
    
    th p
    {
        border:none;
    }

    

	</style>

</head>
<body>
<?php	 ?>

    
	<h1> Product Beheer </h1>  
    <h2> Producten </h2>
	<form>
	<table >
		<tr>
			<th> Naam </th>
			<th> Prijs </th>
			<th style="width:30%;"> Omschrijving </th>
			<th> Categorie </th>
            <th class="laatsteKolomHeader">  <div class = "plusButton"> <a href="#"> + <a/> </div> <span style="font-size:90%;  "> Informatie Kolom Toevoegen </span> </th>
		</tr>
		<tr onclick="selectRow(this)">
			<th> <input type="text" name="title"> </th> 
			<th> <input type = "text" name = "price"> </th>
			<th> <input type = "text" name = "description"> </th>
			<th> <select>
				<option value = "horror"> Horror </option>
				<option value = "thriller"> Thriller </option>
				<option value = "avontuur"> Avontuur </option>
				<option value = "fanfiction"> Fanfiction </option>
				<option value = "Geert Mak"> Geert Mak </option>
			</select> </th>  <div class="verwijderVak"> <div class = "plusButton" style="float:left; position:relative;"> <a href="#"> - </a> </div>  </div>
            <th class="laatsteKolom"> Voeg meer info toe over uw product...</th>
		</tr> 
        <tr>
			<th> <input type="text" name="title"> </th>
			<th> <input type = "text" name = "price"> </th>
			<th class="omschrijving"> <p>Mak verenigt in zijn werk uiteenlopende terreinen als de autobiografische essayistiek, de politiek, de journalistiek, de geschiedwetenschap en de godgeleerdheid. Zijn polemische lef, zijn avontuurlijke nieuwsgierigheid en zijn indringende maatschappelijke betrokkenheid vormen daarbij krachtige drijfveren, die hij op een aanstekelijke wijze weet over te brengen. Daarmee heeft hij alleen al in Nederland een publiek van vele honderdduizenden aan zich weten te binden. </p>
 </th>
			<th> <select>
				<option value = "horror"> Horror </option>
				<option value = "thriller"> Thriller </option>
				<option value = "avontuur"> Avontuur </option>
				<option value = "fanfiction"> Fanfiction </option>
				<option value = "Geert Mak"> Geert Mak </option>
			</select> </th>
            <th class="laatsteKolom"> </th>
		</tr>
        <tr>
			<th> <input type="text" name="title"> </th>
			<th> <input type = "text" name = "price"> </th>
			<th> <input type = "text" name = "description"> </th>
			<th> <select>
				<option value = "horror"> Horror </option>
				<option value = "thriller"> Thriller </option>
				<option value = "avontuur"> Avontuur </option>
				<option value = "fanfiction"> Fanfiction </option>
				<option value = "Geert Mak"> Geert Mak </option>
			</select> </th> 
            <th class="laatsteKolom"> </th>  
		</tr>
	</table>
    
    <div class = "tabelHulpmiddelen">

        <div class = "knopRij">
		<div class = "plusButton" style="margin-top:10px;"> <a href="#"> + </a>  </div> <p style="display:inline-block"> Voeg een product toe...  </p> 
        </div>
        <div class = "knopRij">
		<div class = "plusButton" style="margin-top:10px; clear:left;"> <a href = "#"> - </a> </div> <p style="display:inline-block""> Verwijder geselecteerde producten... </p>
        </div> 
            
    
    	<h4>
    		Uitgebreide Omschrijving <br>
    		<textarea name = "description" rows = "20" cols = "50"> </textarea>
    	</h4>
    
    	<form action="">
        <h2> Voeg Een Batch Toe </h2>
        <input type="file" name="" accept="image/*">
        <button type="button">Submit Batch</button>
        </form>
    </div>

    <script>

   
        





    </script>
</body>
</html>