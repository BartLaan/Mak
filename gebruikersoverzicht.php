<!DOCTYPE html>

<html>

	<head>
		<title> Uw gebruikersgegevens </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

		<style>

        .gebruikerGegevensVeld
        {
            height:50%;
            background-color: #E9E9E9;
            overflow: hidden;
            text-align: left;
            width:45%;

        }

        .informatieVeld
        {
            display:inline-block;
            color: #a9a9a9;
            margin-top:1%;
        }
        
        .informatieKop
        {
            color: #a9a9a9;
            text-align:left;
            margin-bottom:1%;

        }

    	.informatieVeld input[type = "text"] 
        {
            color: #a9a9a9;
            background-color: transparent;
            border: none; 
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
        
        .informatieRij  
        {
            overflow:hidden;
            padding-top:1%;
            padding-left:3%;
            padding-bottom:1%;
            width:100%;
            background-color: #F9F9F9;
            vertical-align: middle;
        }

        .informatieRij2  
        {
            overflow:hidden;
            padding-top:1%;
            padding-left:3%;
            padding-bottom:2%;
            width:100%;
            background-color:#E9E9E9;
            vertical-align: middle;
        }

        .inputValidateBox
        {
            vertical-align: middle;
            margin-top:-1%;
            margin-bottom:-1%;
            display:inline-block;
            width:40%;
            margin-left: 13%;
        }

        .inputAfbeelding
        {
            display:inline-block;
            vertical-align:middle;
            height:22px;
            width:22px;

        }

        .inputTekstGoed
        {
            vertical-align: middle;
            font-size:75%;
            color:#5ad75a;
            display:inline-block;


        }

        .spinAfbeelding
        {
 
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

<?php include 'menu.php';
// Redirect to https
//    if (@$_SERVER['HTTPS'] !== 'on') {
//        $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//        header("Location: $redirect", true, 301);
//        exit();
//    } ?>

    <div id="text">

    <?php
//        if (@$_SERVER['HTTPS'] !== 'on') {
//            $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//            header("Location: $redirect", true, 301);
//            exit();
//        }
        include "database_connect.php";

            // check database voor administratorrechten
//            $query = "SELECT * FROM Klant WHERE Emailadres='" . $_SESSION['email'] . "'AND Administrator=1";
//            $stmt = $db->prepare($query);
//            $stmt->execute();
//            $result = $stmt->fetch(); 
//
            // Zet hierin de dingen exclusief voor administrators
//            if($result && strlen($result["Emailadres"]) > "0") {
//                echo "Je bent een administrator.";
//            }
    ?>

    <h2> Uw Gegevens </h2>
    
    <div class="gebruikerGegevensVeld" style="margin-top:20%;">

        <div class="informatieRij2">
            <div class="informatieVeld"> 
                <input id="Voornaam" onfocus="displayWheel(this)" onfocusout ="processInput(this)" type="text" value="Rijnder"> 
            </div> 
            <div class="informatieVeld" > 
            <input onfocus="displayWheel(this)" onfocusout ="processInput(this)" type="text" style="display:inline-block;margin-left:-5%;" value ="Wever"> </div> 
            <div class="inputValidateBox"> 
                <img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  
                </img>  
            </div>
        </div> 

        <div class="informatieRij" >
            <div class="informatieVeld"> 
                <input id="Emailadres" onfocus="displayWheel(this)" onfocusout ="processInput(this)" type="text"  value="rien334@gmail.com"> 
            </div> 
            <div class="inputValidateBox"> 
                <img class="inputAfbeelding" src="images/wrongInput.png" alt="cross">  </img>  <p class="inputTekstFout">  Geen geldig email adres </p> 
            </div> 
        </div>
        
        <div class="informatieRij2"">
            <div class="informatieVeld"> 
                <input  id="Woonplaats" onfocus="displayWheel(this)" onfocusout ="processInput(this)" type="text" value="Hoorn">  
            </div> 
            <div class="inputValidateBox"> 
                <img class="inputAfbeelding" alt="check" src="" style="visibility:hidden;">  </img>  
            </div>
        </div>

        <div class="informatieRij">
            <div class="informatieVeld"> 
                <input  id="Straat" type="text" value="Houtzaagmolen"> 
            </div>  
            <div class="informatieVeld" > 
                <input id="Huisnummer" type="text" style="display:inline-block; margin-left:-5%" value= "141"> 
            </div>
        </div>
        
        <div class="informatieRij2">
            <div class="informatieVeld"> 
                <input type="text" id="Postcode" value="1622HL">  
            </div> 
            <div class="inputValidateBox"> 
                <img class="inputAfbeelding" src="images/Check.png" alt="check">  </img>  <p class="inputTekstGoed">  Geldige postcode </p> 
            </div>
        </div>


        <div class="informatieRij">
            <div class="informatieVeld"> 
                <input  id="Telefoonnummer" type="text" value="061263883">  
            </div> 
            <div class="inputValidateBox"> 
                <img class="inputAfbeelding" id="spinner" src="images/spin.gif" alt="spin">  </img>  
            </div>
        </div>

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

        <input id="submitButton" style="margin-top:1.5%; margin-left:1%; visibility:hidden; padding:1%;"  type="submit" value="Verander Wachtwoord">
        </form>

    </div>


    <script type="text/javascript">

    function processInput(caller)
    {
        hideWheel(caller);
        var validated = validateInput(caller).split(" ");
        
        var correct = validated[0];
        console.log(validated);
        
        if(correct == "true")
        {
            insertNewValue(caller);
            displayCheckBox(caller);
        }
        else
        {
            // setInnerHtml of some div to :validated[1 - length (want meerdere spaties)]  
        }
        
    }

    function insertNewValue(caller)
    {
        var url = "ValidateKlantInput.php?";

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
                txt = xmlhttp.responseText + "";
            }

        }

        xmlhttp.open("GET",url,false);
        xmlhttp.send();
        return "true 77";
    }


    function displayCheckBox(caller)
    {
        ;
    }

    function validateInput(caller)
    {
        var url = "ValidateKlantInput.php?";

        url = url.concat(caller.id + "=" + caller.value.replace(/\\/g, ''));
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

    function displayWheel(caller)
    {
        if(caller.parentNode.parentNode.parentNode.id == "Straat") 
        {
            caller.parentNode.parentNode.parentNode.childNodes[4].childNodes[1].src = "images/spin.gif";

        }
        caller.parentNode.parentNode.childNodes[3].childNodes[1].src = "images/spin.gif";
        caller.parentNode.parentNode.childNodes[3].childNodes[1].style.visibility = "visible";
    }

    function hideWheel(caller)
    {
        caller.parentNode.parentNode.childNodes[3].childNodes[1].style.visibility = "hidden";

    }

    function toggleButton()
    {
        if(document.getElementById("wachtwoord").value.length > 1 && document.getElementById("herWachtwoord").value.length > 1 )
        {
            document.getElementById("submitButton").style.visibility = "visible";
        }
        else
        {
            document.getElementById("submitButton").style.visibility = "hidden";
        }
    }


    </script>


	</body>

</html>