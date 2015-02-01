<!DOCTYPE html>
<html>
<head>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
    <title> Productbeheer</title>

    <style>

    table
    {
        max-width:80%;
        width:80%;
        float:left;
        border-collapse:collapse; 
    }

    tr
    {
        clear:both;
    }

    table, th, td {
        border: 1px solid #854442;
    }

    th,td 
    {
        width:8%;
        max-width:15%;
    }

    /* Remove textfield styling  */
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


    th
    {
        font-size:90%;
        padding: 1%;
    }
    

    table td
    {
        color: black;
        overflow:scroll:
    }

    /* removes the color change on hover from the first table row */
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

    
    /* Error message that displays next to a row with wrong information */
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


/*
    h1
    {
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        text-align: center;
    }
    h2
    {
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        text-align: center;
    }

    h4
    {
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        text-align: center;
        font-weight:normal;
    } */

    
    .roundButton
    {
        cursor:pointer;
        display:inline-block;
        width:21px;
        height: 21px;
        border: 2px transparent #f5f5f5;
        border-radius: 50%;
        text-decoration:none;
        background: #2A2A2A;
        font-size:100%;
        font-weight:bold;
        text-align:center;
        color:white;
        line-height:20px;
        overflow: hidden;
        vertical-align:center
    }

    .roundButton img
    {
        margin-top:1px;
        width: 13px;
        heigth: 13px;   
        
    }

    .roundButton:hover 
    {
        background: black;
    }

    .roundButton a
    {
        text-decoration: none;
        color: white;
    }

    .knopRij
    {
        height:5%;
    }

    /* box that flows next to rows that holds a delete button and some optional informtion about the input in the row */
    .verwijderVak
    {
        visibility: hidden;
        position:absolute;
        width:17%;
        float:right;
        border-color:cyan;
        left:81.5%;
    }

    /* Omschrijvings data holder */
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
        height:16px;
        -webkit-box-orient: vertical;
        overflow:hidden;
    }

    .omschrijving p
    {
        width:100%;
        margin-top:3.7%;
        border:none; /* looks better on all browsers except firefox*/
    }

 
    /* Some sub information about the information in the header */
    .extraHeaderInfo
    {
        margin-top:1%;
        font-size:70%;
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

<?php 
    include 'menu.php'; 
    include 'TrimLeadingZeroes.php';
?>
    <div id="text" style="padding-left:5%">
    <h1> Productbeheer </h1>  

    <table id="productenTable">
        <?php
            $f = fopen("/tmp/phpLog.txt", "w");

 
            $productenQuery = 'SELECT Productnaam, Categorie, Prijs, Gewicht, Voorraad, Beschrijving, img_filepath, Aanbieding, SecundaireInfo from Product WHERE Productnaam <>  "Wow"  AND Productnaam <> "Test"';
            $stmt = $db->prepare($productenQuery);
            $stmt->execute();
            // We need to loop through the results twice, so we use fetchAll to save the result as an array
            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<tr> <div id="minusButton" class="verwijderVak"> <div class="roundButton" onclick="deleteCurrentRow()" style="float:left; position:relative;">  <img src="images/prullenbakWit.png" alt="verwijder"> </img> </div> </div>';
            $headers = Array(); // Needed to check which headers have already been added 
            // generate the headers
            foreach($resultArray as $results)
            {
                foreach(array_keys($results) as $header)
                {
                    if(in_array($header, $headers))
                    {
                        break;
                    } 
                    array_push($headers, $header);

                    if($header  == "Productnaam")
                    {
                        echo '<th style=" width:20%;"> Naam </th>';
                    }

                    else if($header == "Aanbieding")
                    {
                        echo "<th style='width:6%; max-width:6%;'> Aanbieding <p class='extraHeaderInfo'> (vul '0' in voor geen aanbieding) </p> </th>";
                    }

                    else if($header == "Gewicht")
                    {
                        echo "<th style='width:5%; max-width:5%;'> Gewicht <p class='extraHeadersInfo'> (in grammen) </p> </th>";
                    }

                    else if($header == "img_filepath")
                    {
                        echo '<th > Afbeelding locatie </th>';

                    }

                    else if($header == "SecundaireInfo")
                    {
                        echo '<th  style=" width:15%; max-width:15%;" > Extra info </th>';
                    }

                    else if($header == "Voorraad")
                    {
                        echo '<th style="width:5%; max-width:5%"> ' . $header . '</th>';
                    }

                    else if($header == "Beschrijving")
                    {
                        echo '<th style="width:5%; max-width:5%"> Omschrijving </th>';

                    }

                    else
                    {
                        echo '<th>' . $header . '</th>';
                    }
                }
            }
            echo '</tr>';

            // generate the table rows
            foreach($resultArray as $product)
            {
                echo '<tr onclick="updateRows(this)" class="notFirst">';
                foreach($product as $key => $value)
                {
                    if($key == "Beschrijving")
                    {
                        echo '<td class="omschrijving" > <p>' . $value . ' </p> </td>';
                    }
                    else if($key == "Prijs"  || $key == "Aanbieding")
                    {
                        $correctedValue = trimLeadingZeroes($value);
                        if($key == "Aanbieding" && $value == 0)
                        {
                            $correctedValue = '0.0';
                        }
                        echo '<td> <input onblur="validateInput(this)" onfocus="processInput(this)" type="text" class="' . $key . '" value="' . $correctedValue . '"> </td>';
                    }
                    else
                    {
                        echo '<td> <input onblur="validateInput(this)" onfocus="processInput(this)" type="text" class="' . $key . '" value="' . $value . '"> </td>';
                    }
                }
                echo '</tr>';
            }
            fclose($f); 
        ?>

    </table> 
    
    <div class = "tabelHulpmiddelen">

        <div class = "knopRij">
        <div class = "roundButton" onclick="addRow()" style="margin-top:10px;"> +  </div> <p style="display:inline-block"> Voeg een product toe...  </p> 
        </div>

    
        <h4>
            Uitgebreide Omschrijving <br>
            <textarea  id="omschrijving" onchange="updateOmschrijving()"  rows = "20" cols = "50" value=""> </textarea>
        </h4>
    
    </div>
    </div>

    <script type="text/javascript">

    var currentRow = null;
    var inputValuesBackup = getAllInputValues();
    
    // Stores all the information of inputfields in an array so they can be brought back on a wrong input
    function getAllInputValues()
    {
        var inputFields = document.getElementsByTagName("input");
        var backupDictionary = [];
        for (var i = 0; i < inputFields.length; i++)
        {
            if(inputFields[i].type == "text")
            {
                var id = getRow(inputFields[i]).rowIndex;
                backupDictionary[inputFields[i].className + id] = inputFields[i].value;
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
        var id = getRow(caller).rowIndex;
        if(inputValuesBackup[caller.className + id] != null)
        {
            caller.value = inputValuesBackup[caller.className + id];
        }      
    }


    function getProductID(row)
    {
        return row.rowIndex;
    }


    // Returns the parent row of the caller
    function getRow(caller)
    {
        var elementTraveler = caller;
        while(elementTraveler.tagName != "TR")
        {
            elementTraveler = elementTraveler.parentNode;
        }
        return elementTraveler;
    }

    // Check if the user input is legally formatted
    function validateInput(caller)
    {
        var url = "ValidateProductInput.php?";
        var row = getRow(caller);
        for(var i = 0; i < row.cells.length; i++)
        {
            if(row.cells[i].className == "omschrijving")
            {
                continue;
            }
            if(row.cells[i].childNodes[0].tagName == "INPUT")
            {
                // the child node structures differ for freshly added rows
                url = url.concat(row.cells[i].childNodes[0].className + "=" + row.cells[i].childNodes[0].value.replace(/\\/g, '') + "&");
            }
            else if( row.cells[i].childNodes[1].tagName == "INPUT")
            {
                url = url.concat(row.cells[i].childNodes[1].className + "=" + row.cells[i].childNodes[1].value.replace(/\\/g, '') + "&");
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
                console.log("Response text: " + xmlhttp.responseText);
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
                    var reasons =  xmlhttp.responseText.match(/\[(.*?)\]/);
                    var problemCell = getProblemCell(caller, reasons[1]);
                    displayError(caller, problemCell, (errorMessage[1].slice(0,-2)).split("[")[0]);
                    revertBackOldValue(problemCell);
                }
            }
        }
        xmlhttp.open("POST",url,true);
        xmlhttp.send();
    }

    function displayError(caller, problemCell, message)
    {
        console.log("Error: " + message);
        document.getElementById("minusButton").innerHTML = '<p class="foutieveInfo">' + message + '</p> <div class = "roundButton" onclick="deleteCurrentRow()" style="float:right; position:relative;">  <img src="images/prullenbakWit.png" alt="verwijder"> </img>   </div>';
        problemCell.focus();
        problemCell.select();
    }

    // returns the cell that gave the error
    function getProblemCell(caller, cellName)
    {
        var problemRow = getRow(caller);
        for( var i = 0; i < problemRow.cells.length; i++)
        {
            console.log(problemRow.cells[i].childNodes[0]);
            console.log(problemRow.cells[i].childNodes[1]);
            if(problemRow.cells[i].className == "omschrijving")
            {
                continue;
            }

            if(problemRow.cells[i].childNodes[0].className == cellName)
            {
                console.log(problemRow.cells[i] + "[2]");
                return problemRow.cells[i].childNodes[0];
                
            }

            if(problemRow.cells[i].childNodes.length > 1)
            {
                if(problemRow.cells[i].childNodes[1].className == cellName)
                {
                    return problemRow.cells[i].childNodes[1];
                }   
            }
        }
    }

    // Function that removes error messages and aligns the minus next to the table
    function resetMinusButton()
    {
        document.getElementById("minusButton").innerHTML = '<p class="foutieveInfo"></p> <div class = "roundButton" onclick="deleteCurrentRow()" style="float:left; position:relative;"> <img src="images/prullenbakWit.png" alt="verwijder"> </img> </div>';
    }

    // Insert new user input  in the databese, either updating information or adding a new products
    function insertNewValue(caller)
    {
        var id = getRow(caller).rowIndex;
        inputValuesBackup[caller.className + id] = caller.value;
        var url = "WriteProductInput.php?";
        var row = getRow(caller);
        for(var i = 0; i < row.cells.length; i++)
        {
            if(row.cells[i].className == "omschrijving")
            {
                continue;
            }
            if(row.cells[i].childNodes[0].tagName == "INPUT")
            {
                // the child node structures differ for freshly added rows
                url = url.concat(row.cells[i].childNodes[0].className + "=" + row.cells[i].childNodes[0].value.replace(/\\/g, '') + "&");
            }
            else if( row.cells[i].childNodes[1].tagName == "INPUT")
            {
                url = url.concat(row.cells[i].childNodes[1].className + "=" + row.cells[i].childNodes[1].value.replace(/\\/g, '') + "&");
            }
        }
        url = url.concat("ide=" + getProductID(row));
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
                console.log(xmlhttp.responseText);
            }
        }

        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }

    // Update all the rows to display correctly in regard to the newly selected row
    function updateRows(caller)
    { 
        if(currentRow == caller)
        {
            return;
        }
    
        
        currentRow = caller;       
        currentRow.style.backgroundColor = "#EAEAEA";
        placeTrashCanNextToRow(caller);
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

    

    function placeTrashCanNextToRow(caller)
    {
        document.getElementById("minusButton").style.visibility = "visible";
        var row = getRow(caller);
        var rowOffset = row.rowIndex;
        console.log(row.offsetHeight * (rowOffset));

        document.getElementById("minusButton").style.top = row.offsetHeight / 2 * (rowOffset) + 360 + "px" ;
    }

    function deleteCurrentRow()
    {
        if(currentRow == null)
        {
            return;
        }
        
        alert("Weet je zeker dat je dit product wil verwijderen?");
        var table = document.getElementById("productenTable");
        if(table.rows.length == 2)
        {
            alert("Minstens een product moet blijven bestaan.");
            return;
        }

        var rowToBeDeleted = currentRow.rowIndex;
        deleteTableData();
        if(currentRow.rowIndex == table.rows.length - 1)
        {
            updateRows(table.rows[1]);
        }
        else    
        {
            updateRows(table.rows[currentRow.rowIndex + 1]);
        }
        table.deleteRow(rowToBeDeleted);
    }

    // Deletes the actual data
    function deleteTableData()
    {

        var url = "deleteData.php?";
        url = url.concat("ide=" + getProductID(currentRow));
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

        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }

    // Get the collumn where the omschrijvingsfield is located
    function getOmschrijvingsKolom()
    {
        var table = document.getElementById("productenTable");
        var tableKollomen = table.rows[0].cells;
        var i = 0;
        while(tableKollomen[i].innerText != "Beschrijving")
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
        newRow.onclick = function() { updateRows(this); };
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
                input.onblur = function() { validateInput(this); };
                input.onfocus = function() { processInput(this); };
                cell.appendChild(input);
            }
        }
        updateRows(newRow);
        newRow = populateRowWithClasses(newRow);
        newRow.cells[0].childNodes[0].focus();
    }

    // Populate a row with all the needed classes so individual input fields within a row can be distinguished
    function populateRowWithClasses(row)
    {
        // 1 as index is safe because there is always at least one product
        var referenceCells = document.getElementById("productenTable").rows[1].cells; 
        for(var i = 0; i < row.cells.length; i++)
        {
            row.cells[i].childNodes[0].className = referenceCells[i].childNodes[1].className;
        }
        return row;
    }

    
    function updateOmschrijving()
    {
        if(currentRow == null)
        {
            return;
        }
        getOmschrijvingField(currentRow).innerHTML = document.getElementById("omschrijving").value;

        var url = "WriteProductInput.php?";
        url = url.concat("Beschrijving=" + document.getElementById("omschrijving").value + "&ide=" + getProductID(currentRow));
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

        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }
        

    </script>
</body>
</html>