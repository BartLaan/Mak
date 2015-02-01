<!DOCTYPE html>

<html>

	<head>
		<title>Uw gegevens - Barry's Bakery</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="opmaak.css" rel="stylesheet" type="text/css" />
		<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

		<style>

        /* Container of all the user data, divided in information rows */
        .gebruikerGegevensVeld
        {
            height:40%;
            width:55%;
            background-color: #E9E9E9;
            overflow: hidden;
            text-align: left;
            width:48%;
            margin: 5%;
            margin-bottom:3%;
        }

        /* A single user information input field container */
        .informatieVeld
        {
            margin-top:1%;
            margin-bottom:1%;
            width:23%;
            display:inline-block;
            color: #a9a9a9;
            
        }
        
        /* A header that displays the name of the information */
        .informatieKop
        {
            color: #a9a9a9;
            text-align:left;
            margin-bottom:1%;

        }

    	.informatieVeld input[type = "text"] 
        {
            border:none;
            width:100%;
            color: #a9a9a9;
            background-color: transparent;
        }
    
       /* .informatieVeld input[type = "text"]:focus 
        {
            color: #a9a9a9;
            outline: none;
        }*/
        
        
        .wachtwoordVeld
        {
            margin-bottom:4%;
        }
            
        /* One row of user information (i.e. one or mutiple fields of user input fields) */
        .informatieRij1
        {
            border-top: 1px solid #854442;
            border-right: 1px solid #854442;
            padding-top:3%;
            padding-bottom:3%;
            min-height:8%;
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color: #F9F9F9;
            vertical-align: center;
        }
    
        /* Same as above. Used for the zebra (alternating stripes pattern) pattern in the "gebruikerGegevensVeld" */
        .informatieRij2  
        {
            border-top: 1px solid #854442;
            border-right: 1px solid #854442;
            padding-top:3%;
            padding-bottom:3%;   
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color:#E9E9E9;
            vertical-align: center;
        }

        /* Bottom information row, used for the password fields */
        .informatieRijOnder
        {
            border-top: 1px solid #854442;
            border-right: 1px solid #854442;
            border-bottom: 1px solid #854442;
            padding-top:3%;
            padding-bottom:3%;
            min-height:8%;
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color: #E9E9E9;
            vertical-align: center;
        }
    
        /* A container that holds display elements for displaying various elements for validating the user in put (e.g. it contains error messages */
        .inputValidateBox
        {
            vertical-align: center;
            display:inline-block;
            width:40%;
            margin-left:-20%;
            position:relative;
            float:right;
            margin-top:-0.5%;
            
        }

        /* Image class that displays a image element based on the validation process of the user
        .inputAfbeelding
        {
            display:inline-block;
            vertical-align:middle;
            height:17px;
            width:17px;

        }

        /* Text styling when the user has entered correct information */
        .inputTekstGoed
        {
            vertical-align: middle;
            font-size:75%;
            color:#5ad75a;
            display:inline-block;
        }

        /* Text styling when the user has entered incorrect information */
        .inputTekstFout
        {
            color:#e18484;
            font-size:75%;
            display:inline-block;
        }
        </style>

    </head>

    <body>

 <?php include 'menu.php'; ?>
    <div id="text">
    <br />
<?php 
    if (isset($_SESSION['Klant_ID'])) {
        $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $admin = $stmt->fetch(); 

        if ($admin && strlen($admin["Emailadres"]) > "0") {
            echo '<a href="Administratorpagina.php" style="margin:5%">Klik hier om naar de administratorpagina te gaan</a>';
        }
    }
?>
    <h1 style="margin:5%; text-align:left;"> Uw Gegevens </h1>
    <p style="margin:5%;">Klik op een veld om uw informatie te wijzigen. </p>
    <?php 
        if(!isset($_SESSION['Klant_ID']))
        {
            echo "U bent niet ingelogd.";
        }
        if(isset($_POST['wachtwoord']) && ($_POST['herWachtwoord'] != $_POST['wachtwoord'])) 
        {
            echo "De wachtwoorden komen niet overeen.";
        } elseif (isset($_POST['wachtwoord']))
        {
            // Emailadres van gebruiker ophalen
            $stmt = $db->prepare("SELECT Emailadres FROM Klant WHERE Klant_ID='". $_SESSION['Klant_ID'] ."'");
            $stmt->execute();
            $emailArr = $stmt->fetch();
        // Wachtwoord updaten in DB
            $sha1ww = sha1($_POST['wachtwoord'] . "$dbconf->mysql_salt" . $emailArr['Emailadres']);
            $stmt = $db->prepare("UPDATE Klant SET Wachtwoord='". $sha1ww ."'WHERE Klant_ID='". $_SESSION['Klant_ID'] ."'");
            $stmt->execute();
            $result = $stmt->fetch();

            echo '<p style="margin-left:7%;">Gelukt! Uw wachtwoord is veranderd.</p>';
        }
    ?>
    
    <div class="gebruikerGegevensVeld">

    <?php 

        if(isset($_SESSION['Klant_ID']))
        {
            // a value that varies between 1 and 0, incidating the color of the row
            $informatijRijIterator = 0;
        
        $klantInfoQuery = 'SELECT Voornaam, Achternaam, Straat, Huisnummer, Postcode, Woonplaats, Telefoonnummer, Emailadres from Klant WHERE Klant_ID = ' . $_SESSION["Klant_ID"] . ';';
        $stmt = $db->prepare($klantInfoQuery);
        $stmt->execute();
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($resultArray as $results)
        {
            foreach($results as $key => $value)
            {
                $informatieRijSoort = ($informatijRijIterator % 2) + 1;
                if($key == "Voornaam")
                {
                    echo '<div class="informatieRij' . $informatieRijSoort . '">';
                        echo '<div class="informatieVeld">';
                            echo '<input id="' . $key . '"   onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value .'">';
                        echo '</div>';
                        echo '<div class="informatieVeld">';
                            echo '<input id="Achternaam" onfocus="processInput(this)" onfocusout="validateInput(this)" type="text" style="display:inline-block; margin-left:3%" value="' . $results["Achternaam"] .'">';
                        echo '</div>';
                        echo '<div class="inputValidateBox">';
                            echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';

                }

                else if($key == "Achternaam")
                {
                    // display is handeld in ($key == "Voornaam")
                    continue;  
                }

                else if($key == "Huisnummer")
                {
                    continue;
                }

                else if($key == "Straat")
                {
                    echo '<div class="informatieRij' . $informatieRijSoort .'">';
                        echo '<div class="informatieVeld">';
                            echo '<input  id="Straat" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value . '">';
                            echo '</div>';
                            echo '<div class="informatieVeld">';
                                echo '<input id="Huisnummer" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" style="display:inline-block; margin-left:3%" value= "' . $results["Huisnummer"] . '">';
                            echo '</div>';
                            echo '<div class="inputValidateBox">';
                                echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                            echo '</div>';
                        echo '</div>';

                }
                
                else if( $key == "Telefoonnummer" && ($value == "" || strlen(preg_replace('/\s+/', '', $value)) < 1))
                {
                    echo '<div class="informatieRij' . $informatieRijSoort . '">';
                        echo '<div class="informatieVeld">';
                            echo '<input id="Telefoonnummer" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="[geen telefoonnummer ingevoerd]">';
                        echo '</div>';
                        echo '<div class="inputValidateBox">';
                            echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';
                }

                else
                {
                    echo '<div class="informatieRij' . $informatieRijSoort . '">';
                        echo '<div class="informatieVeld">';
                            echo '<input id="' . $key . '" onfocus="processInput(this)" onfocusout ="validateInput(this)" type="text" value="' . $value . '">';
                        echo '</div>';
                        echo '<div class="inputValidateBox">';
                            echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';
                }
                $informatijRijIterator++;
            }
    
        }

        }
    ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="informatieRij1">
            <h5 class="informatieKop"> Nieuw Wachtwoord </h5>
            <div class="wachtwoordVeld" > 
                <input name="wachtwoord" id="wachtwoord" type="password" onchange="toggleButton()">  
            </div>
        </div>

        <div class="informatieRijOnder">
            <h5 class="informatieKop"> Herhaal Wachtwoord </h5>
            <div class="wachtwoordVeld"> 
            <input name="herWachtwoord" id="herWachtwoord" type="password"  onchange="toggleButton()">  </div>
        </div>    
    </div>
        <p id="wwMelding" style="margin-left:5%; color:#e18484; visibility:hidden;">De wachtwoorden komen niet overeen.</p>
        <input id="submitButton" style="margin-left:5%;" type="submit" value="Verander Wachtwoord" disabled>
        </form>
        <button>Opslaan</button>

    </div>


    <script type="text/javascript">


    var inputValuesBackup = getAllInputValues();
        
    // Generates an backup of all the inputfields
    function getAllInputValues()
    {
        var inputFields = document.getElementsByTagName("input");
        var backupDictionary = [];
        for (var i = 0; i < inputFields.length; i++)
        {
            if(inputFields[i].type == "text")
            {
                backupDictionary[inputFields[i].id] = inputFields[i].value;
            }
        }
        return backupDictionary;
    }


    function processInput(caller)
    {
        displayWheel(caller);
        inputValuesBackup[caller.id] = caller.value; // Save the old value
    }

    // Inserts a change in the databese
    function insertNewValue(caller)
    {
        inputValuesBackup[caller.id] = caller.value;
        var url = "WriteGebruikerInput.php?";

        url = url.concat(caller.id + "=" + caller.value + "&id=" + <?php echo json_encode($_SESSION['Klant_ID']); ?>);

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


    function displayCheckBox(caller)
    {
        getInputValidBox(caller).innerHTML =  '<img class="inputAfbeelding" src="images/Check.png" alt="check">  </img>  <p class="inputTekstGoed"> Succesvol gewijzigd </p>';
    }

    // Get the information row of an element specified in the argument
    function getInformatijRijWrapper(caller)
    {
        var informatijRijTraveler = caller;
        while(!(informatijRijTraveler.className.indexOf("informatieRij") == 0))
        {
            informatijRijTraveler = informatijRijTraveler.parentNode;
        }
        return informatijRijTraveler;
    }

    // Gets the inputValid container 
    function getInputValidBox(caller)
    {
        var informatijRijChildren = getInformatijRijWrapper(caller).childNodes;
        for( var i = 0; i < informatijRijChildren.length; i++)
        {
            if(informatijRijChildren[i].className == "inputValidateBox")
            {

                return informatijRijChildren[i];
            }
        }

    }


    // Calls an php script that validates the new user input  
    function validateInput(caller)
    {
        if(caller.id == "Emailadres" && inputValuesBackup["Emailadres"] == caller.value)
        {
            hideWheel(caller);
            return;
        }
        var url = "ValidateKlantInput.php?";

        url = url.concat(caller.id + "=" + caller.value.replace(/\\/g, ''));

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
                var validated = xmlhttp.responseText.split(" ");
        
                var correct = validated[0];
                
                if(correct == "true")
                {
                    console.log("Nice!");
                    insertNewValue(caller);
                    displayCheckBox(caller);
                }

                else
                {
                    var errorMessage = xmlhttp.responseText.split("=>");
                    for (var i = 0; i < errorMessage.length; i++)
                    {
                        console.log(i + ":"  + errorMessage[i]);
                    }
                    displayError(caller, errorMessage[1].slice(0,-2));
                    revertBackOldValue(caller);   
                }
            }

        }

        xmlhttp.open("GET",url,true);
        xmlhttp.send();

    }

    function displayError(caller, message)
    {
        console.log("wow" + message);
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" src="images/wrongInput.png" alt="cross"> </img>  <p class="inputTekstFout">'  + message  + ' </p>';

    }

    function revertBackOldValue(caller)
    {
        caller.value = inputValuesBackup[caller.id];        
    }

    function displayWheel(caller)
    {
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" id="spinner" src="images/spin.gif" alt="spin">  </img>';
    }

    function hideWheel(caller)
    {
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" id="spinner" src="" alt="none" style="visibility:hidden">  </img>';
    }

    // Toggles the button for submutting the new password, making it non useable under certain circumstances
    function toggleButton()
    {
        if(document.getElementById("wachtwoord").value.length > 0 && document.getElementById("herWachtwoord").value.length > 0 && (document.getElementById("wachtwoord").value == document.getElementById("herWachtwoord").value) )
        {
            document.getElementById("submitButton").disabled = false;
            document.getElementById("wwMelding").style.visibility="hidden";
        }
        else
        {
            document.getElementById("submitButton").disabled = true;
            if (document.getElementById("wachtwoord").value != document.getElementById("herWachtwoord").value && document.getElementById("herWachtwoord").value.length > 0) 
            {
                document.getElementById("wwMelding").style.visibility="visible";
            };
        }
    }


    </script>


	</body>

</html>