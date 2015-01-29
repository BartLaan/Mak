<!DOCTYPE html>
<html>
<head>
	<title> Product Beheer</title>

	<style>

    table
    {
        width:80%;
        float:left;
		border-collapse:collapse; 
    }

    tr
    {
    }
    
    tr
    {
        clear:both;
    }

	table, th, td {
		border: 1px solid #E3E3E3;
	}

	th,td 
    {
        width:8%;
	}

    /* De input & select regels moeten hoe dan ook naar een extern style sheet */

	input[type = "text"] 
    {
        background-color: transparent;
        border: none; 
        width:100%;
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
        color: black;
        overflow:scroll:
    }

    .notFirst:hover
    {
        background-color: #EAEAEA;
    }
    

    tr:nth-child(even) 
    {
        background-color: #F7F7F7;
    }

    tr:nth-child(odd) 
    {
        background-color: white;
    }


    .foutieveInfo
    {
        vertical-align:top;
        float:left;
        color: #854442;
        font-size: 80%;
        margin-top:2%;
        display:inline-block;
        position:relative;
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
    }

    .knopRij
    {
        height:5%;
    }

    .verwijderVak
    {
        visibility: hidden;
        position:absolute;
        width:18%;
        float:right;
        border:solid;
        border-width:thin;
        border-color:cyan;
        top: 40%;
        left:80%;
    }

    .laatsteKolomHeader
    {
        border-color: #E3E3E3;
        border-width: 1px;
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
        border: none;
        width:100%;
        font-size:80%;
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
        width:100%;
        margin-top:2%;
        border:none;
    }

    .tabelHulpmiddelen
    {
		clear:both;
    }
    
    td p
    {
        border:none;
    }

    textarea
    {
        max-width:50%;
        max-heigth:70%;
    }
	</style>

</head>
<body>

<?php include 'menu.php'; ?>
    
	<h1> Product Beheer </h1>  
    <h2> Producten </h2>
	<form>
	<table id="productenTable">
		<tr >
			<th> Naam </th>
			<th> Prijs </th>
			<th> Omschrijving </th>
			<th> Categorie </th>
            <th> Aanbieding <br> <span style="font-size:70%;"> (vul '0' in voor geen aanbieding) </span> </th>
            <th> Voorraad </th>
            <th> Afbeelding </th>
            <th> Extra Info </th>
            <th> Gewicht </th>
		</tr>

        <?php 
//            $stmt = $db->prepare($klantInfoQuery);
//            $stmt->execute();
//            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        
//            foreach($resultArray as $results)
//            {
//                foreach($results as $key => $value)
//                {
//                    
//                }
//            }

        ?>

		<tr onclick="updateRows(this)" class="notFirst">
			<td> <input onfocusout="validateInput(this)" onfocus="processInput(this)" type="text" class="Productnaam" value="Brood"> </td> 
			<td> <input class="Prijs" type="text" value="13.70"> </td>
            <td class="omschrijving" > <p> We have seen that our Creator cares about us and has arranged a plan to enable us to have life after death. This must give us a real hope for the future, despite our present problems. Jesus Christ promised that those who believe in him will be given endless life: </p>
            </td>			
            <td> <input type="text" class="Categorie">  </td>

		</tr> 
        <tr onclick="updateRows(this)" class="notFirst">  <div id="minusButton" class="verwijderVak"> <p class="foutieveInfo">  </p> <div class = "plusButton" onclick="deleteCurrentRow()" style="float:left; position:relative;"> <a href=""> - </a> </div>  </div>
			<td> <input type="text" name="title"> </td>
			<td> <input type = "text" name = "price"> </td>
            <td class="omschrijving"> <p> Mak verenigt in zijn werk uiteenlopende terreinen als de autobiografische essayistiek, de politiek, de journalistiek, de geschiedwetenschap en de godgeleerdheid. Zijn polemische lef, zijn avontuurlijke nieuwsgierigheid en zijn indringende maatschappelijke betrokkenheid vormen daarbij krachtige drijfveren, die hij op een aanstekelijke wijze weet over te brengen. Daarmee heeft hij alleen al in Nederland een publiek van vele honderdduizenden aan zich weten te binden. </p>
 </td>
			<td> <input type="text" name="categorie"> </td>   
		</tr>

        <tr onclick="updateRows(this)" class="notFirst">
			<td> <input type="text" name="title"> </td>
			<td> <input type = "text" name = "price"> </td>
            <td class="omschrijving"> <p>Ernest Dichter heeft deze methode gepraktiseerd voor de marketing. Aangezien een enkel resultaat met betrekking tot beweegredenen weinig betekenis heeft voor een marketeer heeft Dichter een sterk collectief karakter meegegeven aan de technieken van Freud, de interesse van een markketeer moet namelijk in de eerste plaats kijken hoe een mens zich gedraagt naar Dichter's idee, zo zal hij snel kunnen duiden waar de beweegreden zit.
 </p> </td>
	<td> <input type="text" name="categorie"> </td> 
		</tr>
	</table> 
    
    <div class = "tabelHulpmiddelen">

        <div class = "knopRij">
		<div class = "plusButton" onclick="addRow()" style="margin-top:10px;"> <a href=""> + </a>  </div> <p style="display:inline-block"> Voeg een product toe...  </p> 
        </div>

    
    	<h4>
    		Uitgebreide Omschrijving <br>
    		<textarea  id="omschrijving" onchange="updateOmschrijving()"  rows = "20" cols = "50" value=""> </textarea>
    	</h4>
    
    	<form action="">
        <h2> Voeg Een Batch Toe </h2>
        <input type="file" name="" accept="image/*">
        <button type="button">Submit Batch</button>
        </form>
    </div>

    <script type="text/javascript">

    var currentRow = null;
    var inputValuesBackup = getAllInputValues();
    var rowProductID; // an array that holds the product ID for all the rows in the table
    
    function getAllInputValues()
    {
        var inputFields = document.getElementsByTagName("input");
        var backupDictionary = [];
        for (var i = 0; i < inputFields.length; i++)
        {
            if(inputFields[i].type == "text")
            {
                backupDictionary[inputFields[i].className] = inputFields[i].value;
            }
        }
        return backupDictionary;
    }


    function processInput(caller)
    {
        inputValuesBackup[caller.id] = caller.value; // Save the old value
    }

    function revertBackOldValue(caller)
    {
        console.log("Test");
        caller.value = inputValuesBackup[caller.className];        
    }


    function getProductID(row)
    {
        return row.rowIndex + 1;
    }

    // I know this is almost the same function as in gebruikersoverzicht, but the actions that need to be excuted when the input is validated differ. Because of the asynchronicity in AJAX, these can't be safely removed  out of the anomynous function body.

    function getTextfield(row)
    {
        var i = 0;
        while(row.childNodes[i].tagName != "Input")
        {
            i++;
        }
        return row.childNodes[i]; 
    }

    function getRow(caller)
    {
        var elementTraveler = caller;
        while(elementTraveler.tagName != "TR")
        {
            elementTraveler = elementTraveler.parentNode;
        }
        return elementTraveler;
    }

    function validateInput(caller)
    {
        var url = "ValidateProductInput.php?";
        var row = getRow(caller);
        console.log(document.getElementById("productenTable").rows[1]);
        for(var i = 0; i < row.cells.length; i++)
        {
            if( row.cells[i].childNodes[1].tagName == "INPUT")
            {
                url = url.concat(row.cells[i].childNodes[1].className + "=" + row.cells[i].childNodes[1].value.replace(/\\/g, '') + "&");
                console.log("Nice!");
            }
        }
        
        url = url.slice(0,-1);
        console.log(url);
        if (window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                console.log("Cool: " + xmlhttp.responseText);
                var validated = xmlhttp.responseText.split(" ");
        
                var correct = validated[0];
                
                if(correct == "true")
                {
                    resetMinusButton();
                    insertNewValue(caller);
                }

                else
                {
                    var errorMessage = xmlhttp.responseText.split("=>");
                    
//                    for (var i = 0; i < errorMessage.length; i++)
//                    {
//                        console.log(i + ":"  + errorMessage[i]);
//                    }
//                    
                    var reasons =  xmlhttp.responseText.match(/\[(.*?)\]/);
                    var problemCell = getProblemCell(caller, reasons[1]);
                    displayError(caller, problemCell, (errorMessage[1].slice(0,-2)).split("[")[0]);
                    revertBackOldValue(problemCell);
                }
            }
        }

        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }

    function displayError(caller, problemCell, message)
    {
        console.log(message);
        document.getElementById("minusButton").innerHTML = '<p class="foutieveInfo">' + message + '</p> <div class = "plusButton" onclick="deleteCurrentRow()" style="float:right; position:relative;"> <a href="#"> - </a> </div> ';
        problemCell.focus();
        problemCell.select();
    }

    function getProblemCell(caller, cellName)
    {
        var problemRow = getRow(caller);
        for( var i = 0; i < problemRow.cells.length; i++)
        {
            if(problemRow.cells[i].childNodes[1].className == cellName)
            {
                return problemRow.cells[i].childNodes[1];
            }   
        }
    }

    // Function that removes error messages and aligns the minus next to the table
    function resetMinusButton()
    {
        document.getElementById("minusButton").innerHTML = '<p class="foutieveInfo"></p> <div class = "plusButton" onclick="deleteCurrentRow()" style="float:left; position:relative;"> <a href="#"> - </a> </div>';
    }

    function insertNewValue(caller)
    {
        inputValuesBackup[caller.id] = caller.value;
        var url = "WriteProductInput.php?";

        url = url.concat(caller.id + "=" + caller.value + "&id=" + getProductID(currentRow));

        if (window.XMLHttpRequest) 
        {
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                console.log(xmlhttp.responseText);
            }
        }

        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }


    function updateRows(caller)
    {
        if(currentRow == caller)
        {
            return;
        }

        currentRow = caller;       
        currentRow.style.backgroundColor = "#EAEAEA";
        placeMinusNextToRow(caller);
        deselectRows(caller);
        resetMinusButton();
        displayOmschrijving(caller);
    }

    function displayOmschrijving(caller)
    {
        var omschrijvingsField = document.getElementById("omschrijving");
        omschrijvingsField.value = getOmschrijvingField(caller).innerHTML;
    }

    function getOmschrijvingField(caller)
    {
        var tableData = caller.childNodes;
        var i = 0;
        
        while(tableData[i].className != "omschrijving")
        {
            i++;
        }
        var j = 0;
        while(tableData[i].childNodes[j].tagName != "P")
        {
            j++;
        }
        return tableData[i].childNodes[j];
    }
    
    function deselectRows(caller)
    {
        var j = 0;
        var rows = document.getElementsByTagName("tr");
        for( var i = 0; i < rows.length; i++)
        {
            if(rows[i] != caller)
            {
                if( j % 2 == 0)
                {
                    rows[i].style.backgroundColor = "#FAFAFA";
                }
                else
                {
                    rows[i].style.backgroundColor = "white";
                }
            }
            j++;
        }
    }

    

    function placeMinusNextToRow(caller)
    {
        document.getElementById("minusButton").style.visibility = "visible";
        var rect = caller.getBoundingClientRect();
        document.getElementById("minusButton").style.top = rect.top - ((rect.top - rect.bottom) / 2) - 10  + "px" ;
    }

    function deleteCurrentRow()
    {
        var table = document.getElementById("productenTable");
        if(table.rows.length == 2)
        {
            alert("Minstens een product moet blijven bestaan.");
            return;
        }

        console.log(table.rows[currentRow.rowIndex]);
        var rowToBeDeleted = currentRow.rowIndex;
        if(currentRow.rowIndex == table.rows.length - 1)
        {
            updateRows(table.rows[1])
        }
        else    
        {
            updateRows(table.rows[currentRow.rowIndex + 1]);
        }
        table.deleteRow(rowToBeDeleted);
    }

    function getOmschrijvingsKolom()
    {
        var table = document.getElementById("productenTable");
        var tableKollomen =  table.rows[0].cells;
        var i = 0;
        while(tableKollomen[i].innerText != "Omschrijving")
        {
            i++;
        }
        return i;

    }

    function addRow()
    {
        var table = document.getElementById("productenTable");        
        var newRow = table.insertRow(-1);
        var collumnCount = table.rows[0].cells.length;
        var omschrijvingPositie = getOmschrijvingsKolom();
        newRow.className = "notFirst";
        var newRowIndex = newRow.rowIndex;
        newRow.onclick = function() { updateRows(document.getElementById("productenTable").rows[newRowIndex]); };
        for(var i = 0; i < collumnCount; i++)
        {
            var cell = newRow.insertCell(i);
            if(i == omschrijvingPositie)
            {
                cell.className = "omschrijving";
                cell.appendChild(document.createElement('p'));
                cell.childNodes[0].innerHTML = "";
            }
            else
            {
                var input = document.createElement('input');
                input.setAttribute('type', 'text');
                cell.appendChild(input);
            }
        }
        updateRows(newRow);
        newRow.cells[0].childNodes[0].focus();

   }

    function updateOmschrijving()
    {
        getOmschrijvingField(currentRow).innerHTML = document.getElementById("omschrijving").value;

        var url = "WriteProductInput.php?";
        url = url.concat("Beschrijving =" + document.getElementById("omschrijving").value + "&id=" + getProductID(currentRow));

        if (window.XMLHttpRequest) 
        {
            xmlhttp = new XMLHttpRequest();
        } 
        else 
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                console.log(xmlhttp.responseText);
            }
        }

        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }
        

    </script>
</body>
</html>