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

    function getIdFromURL()
    {
        var urlArray = document.URL.split('=');
        if(urlArray.length > 1)
        {
            return urlArray[urlArray.length - 1];
        }
        return "";
    }

    function insertNewValue(caller)
    {
        inputValuesBackup[caller.id] = caller.value;
        var url = "WriteProductInput2.php?";
<<<<<<< HEAD
        var id = getIdFromUrl()
        console.log(id);
        url = url.concat(caller.id + "=" + caller.value + "&id=" + <?php echo json_encode($_GET['id']) ?> );
=======

        url = url.concat(caller.id + "=" + caller.value + "&id=" + "<?php json_encode($_GET['id']); ?>");


>>>>>>> 28ce96ea60d2b39b21d2b8d36c693310ec507ffd
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
        /*if(caller.id == "Emailadres" && inputValuesBackup["Emailadres"] == caller.value)
        {
            hideWheel(caller);
            return;
        }*/
        var url = "ValidateProductInput.php?";

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
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" src="images/wrongInput.png" alt="cross"> <p class="inputTekstFout">'  + message  + ' </p>';

    }

    function revertBackOldValue(caller)
    {
        caller.value = inputValuesBackup[caller.id];        
    }

    function displayWheel(caller)
    {
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" id="spinner" src="images/spin.gif" alt="spin"> ';
    }

    function hideWheel(caller)
    {
        getInputValidBox(caller).innerHTML = '<img class="inputAfbeelding" id="spinner" src="" alt="none" style="visibility:hidden">';
    }

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

