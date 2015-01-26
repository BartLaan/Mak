<!DOCTYPE html>
<html>
<head>
	<title> Product Beheer</title>

	<style>

    table
    {
        border-bottom:none;
        width:100%;
        float:left;
    }
    
	table, th, td {
		border: 1px solid black;
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
    

    table td
    {
        max-width:100%;
        color: black;
        overflow:hidden;
		text-align:center;

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
    }

    .knopRij
    {
        margin-bottom:-1.5%;
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
        height:18px;
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
	<?php
	?>

    
	<h1> Product Beheer </h1>  
    <h2> Producten </h2>
	<form>
	<table>
		<tr>
			<th> Aanpassen </th>
			<th> Verwijderen </th>
			<th> Naam </th>
			<th> Prijs </th>
			<th> Voorraad </th>
			<th style="width:30%;"> Omschrijving </th>
			<th> Gewicht(g) </th>
			<th> Categorie </th>
			<th> Aanbieding </th>
			<th> Secundaire Info </th>
		</tr>
		<?php include 'database_connect.php';
			$productnaamSQL = "SELECT * FROM Product";
			$PRODUCTEN = $db -> prepare($productnaamSQL);
			$PRODUCTEN -> execute();
			while($row = $PRODUCTEN -> fetch()){
				echo $row["Productnaam"];
			}
			
		?>
		<tr>
			<td> <div class = "knopRij"> <div class = "plusButton" style="margin-top:10px;"> <a href="#"> + </a>  </div> </div> </td>
			<td> <div class = "plusButton" style="margin-top:10px; clear:left;"> <a href = "#"> - </a> </div> </td> 
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> Geert Mak </td>
			<td> </td>
			<td> </td>
		</tr> 
        <tr>
			<td> <div class = "knopRij"> <div class = "plusButton" style="margin-top:10px;"> <a href="#"> + </a>  </div> </div> </td>
			<td> <div class = "plusButton" style="margin-top:10px; clear:left;"> <a href = "#"> - </a> </div> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td class="omschrijving"> <p>Mak verenigt in zijn werk uiteenlopende terreinen als de autobiografische essayistiek, de politiek, de journalistiek, de geschiedwetenschap en de godgeleerdheid. Zijn polemische lef, zijn avontuurlijke nieuwsgierigheid en zijn indringende maatschappelijke betrokkenheid vormen daarbij krachtige drijfveren, die hij op een aanstekelijke wijze weet over te brengen. Daarmee heeft hij alleen al in Nederland een publiek van vele honderdduizenden aan zich weten te binden. </p> </td>
			<td> </td>
			<td> Geert Mak </td>
			<td> </td>
		</tr>
        <tr>
			<td> <div class = "knopRij"> <div class = "plusButton" style="margin-top:10px;"> <a href="#"> + </a>  </div> </div> </td>
			<td> <div class = "plusButton" style="margin-top:10px; clear:left;"> <a href = "#"> - </a> </div> </td>
			<td> </td>
			<td> </td>
			<td> </td> 
			<td> </td>
			<td> </td>
            <td> </td>  
			<td> </td>
			<td> </td>
		</tr>
	</table>
    
    <div class = "tabelHulpmiddelen">

        <div class = "knopRij">
		<div class = "plusButton" style="margin-top:10px;"> <a href="#"> + </a>  </div> <p style="display:inline-block"> Voeg een product toe...  </p> 
        </div>
    
    	<form action="">
        <h2> Voeg Een Batch Toe </h2>
        <input type="file" name="" accept="image/*">
        <button type="button">Submit Batch</button>
        </form>
    </div>
</body>
</html>