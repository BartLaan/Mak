<!DOCTYPE html>

<html>

	<head>
		<title> Uw gebruikersgegevens </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

		<style>

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

        .informatieVeld
        {
            margin-top:1%;
            margin-bottom:1%;
            width:23%;
            display:inline-block;
            color: #a9a9a9;
            
        }
        
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
    
        .informatieVeld input[type = "text"]:focus 
        {
            color: #a9a9a9;
            outline: none;
        }
        
        .wachtwoordVeld
        {
            margin-bottom:4%;
        }
        
        .informatieRij1
        {
            
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

        .informatieRij2  
        {            
            padding-top:3%;
            padding-bottom:3%;   
            overflow:hidden;
            padding-left:3%;
            padding-right:10%;
            width:100%;
            background-color:#E9E9E9;
            vertical-align: center;
        }

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

        .inputAfbeelding
        {
            display:inline-block;
            vertical-align:middle;
            height:17px;
            width:17px;

        }

        .inputTekstGoed
        {
            vertical-align: middle;
            font-size:75%;
            color:#5ad75a;
            display:inline-block;


        }

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

        /*
        if (@$_SERVER['HTTPS'] !== 'on') {
            $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header("Location: $redirect", true, 301);
            exit();
        } 
        */

        include "database_connect.php";
        if(!isset($_SESSION['Klant_ID']))
        {
            echo "U bent niet ingelogd.";
        }
        else    
        {
            $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(); 
        // Zet hierin de dingen exclusief voor administrators
            if($result && strlen($result["Emailadres"]) > "0") 
            {
                echo "Je bent een administrator.";
            }
        }
    ?>


    <h2 style="margin:5%"> Uw Gegevens </h2>


    
    <div class="gebruikerGegevensVeld">

    <?php 

        if( isset($_SESSION['Klant_ID']))
        {
            $informatijRijIterator = 0;
            $f = fopen("/tmp/phpLog.txt", "w");
    
        
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
                        echo '<img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';

                }

                else if($key == "Achternaam")
                {
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
                    continue;
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

        fclose($f);

        }
    ?>

  
        <form action="changePassword.php" method="get">
        <div class="informatieRij2">
            <h5 class="informatieKop"> Nieuw Wachtwoord </h5>
            <div class="wachtwoordVeld" > 
                <input type="password" id="wachtwoord"  onchange="toggleButton()">  
            </div>
        </div>

        <div class="informatieRij">
            <h5 class="informatieKop"> Herhaal Wachtwoord </h5>
            <div class="wachtwoordVeld"> 
            <input id="herWachtwoord"  type="password"  onchange="toggleButton()">  </div>
        </div>    
    </div>

        <input id="submitButton" style="margin-left:7%;"   type="submit" value="Verander Wachtwoord" disabled>
        </form>

    </div>


    <script type="text/javascript">


    var inputValuesBackup = getAllInputValues();
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

    function insertNewValue(caller)
    {
        inputValuesBackup[caller.id] = caller.value;
        var url = "WriteInput.php?";

        url = url.concat(caller.id + "=" + caller.value);

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
        getInputValidBox(caller).innerHTML =  '<img class="inputAfbeelding" src="images/Check.png" alt="check">  </img>  <p class="inputTekstGoed"> Geldige ' + caller.id + ' </p>';
    }

    function getInformatijRijWrapper(caller)
    {
        var informatijRijTraveler = caller;
        while(!(informatijRijTraveler.className.indexOf("informatieRij") == 0))
        {
            informatijRijTraveler = informatijRijTraveler.parentNode;
        }
        return informatijRijTraveler;
    }

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


    function validateInput(caller)
    {
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
        var url = "GetOldValue.php?";
        var customerID = "";

        url = url.concat(caller.id + "=" + caller.value.replace(/\\/g, ''));
        url = url.concat("& id=" + customerID);

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
//                caller.value = xmlhttp.responseText;
   
            }
        }

        xmlhttp.open("GET",url,true);
//        xmlhttp.send();

    }

    function displayWheel(caller)
    {
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" id="spinner" src="images/spin.gif" alt="spin">  </img>';

    }


    function toggleButton()
    {
        if(document.getElementById("wachtwoord").value.length > 1 && document.getElementById("herWachtwoord").value.length > 1 )
        {
            document.getElementById("submitButton").disabled = false;
        }
        else
        {
            document.getElementById("submitButton").disabled = true;
        }
    }


    </script>


	</body>

</html>