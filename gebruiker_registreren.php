<!DOCTYPE html>

<html>
	<head>

		<title>
			Registreren
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
        <style>

            h1
            {
                margin: 1%;
                text-align: center;
            }

            h4
            {
                margin-bottom: 1%;
            }
    
            fieldset
            {
                background-color: #FBFBfB;
                width: 30%;
                margin: auto;
            	text-align: center;

            }

            .infoPaar
            {
                clear:both;
            }
                
            form {
            	text-align: center;
            }
        </style>

	</head>

    <body>
    	<?php include 'menu.php'; ?>
    	<div id="page">
           <div id="text">
           		<div class="center">
					<form>
			    		<h1> Mak Uw Account </h1>

			            <fieldset>
			                <legend>Persoonlijke Informatie</legend>
			                <div class="infoPaar">
			                    <div class="infoVeld">
			                        <h4> Voornaam </h4>
			                        <input type="text" name="voornaam">
			                        </div>
			                    <div class="infoVeld">
			                        <h4> Achternaam </h4>
			                        <input type="text" name="achternaam">
			                    </div>
			                </div>
			                <div class="infoPaar">
			                    <div class="infoVeld">
			                    <h4> Geslacht </h4>
			                    	<select>
			                    	<option value = "man"> Man </option>
			                    	<option value = "vrouw"> Vrouw </option>
			                        </select>
			                    </div>
			                </div>
			            </fieldset>

			            <fieldset>
			                <legend> Adres Gegevens </legend>
			                <div class="infoPaar">
			                    <div class="infoVeld">
			            			<h4> Woonplaats</h4>
			            			<input type="text" name="woonplaats">
			                    </div>
			                    <div class="infoVeld">
			            			<h4> Postcode </h4>
			            			<input type="text" name="postcode" maxlength="6">
			                    </div>
			                </div>
			                <div class="infoPaar">
			                    <div class="infoVeld">
			            			<h4> Straat</h4>
			                			<input type="text" name="straat">
			                    </div> 
			                    <div class="infoVeld">
			            			    <h4>Huisnummer</h4>
			            			<input type="text" name="huisnummer"  maxlength="4">
			                    </div>
			                </div>
			            </fieldset>


			            <fieldset>
			                <legend> Contact Informatie </legend>
			                <div class="infoPaar">
			                    <div class="infoVeld">
			            			<h4> Telefoonnummer </h4>
			            			<input type="text" name="telefoonnummer">
			                    </div>
			                    <div class="infoVeld">
			            			<h4> Emailadres </h4>
			            			<input type="text" name="email">
			                    </div>
			            </fieldset>

			            <fieldset>
			                <legend> Gebruiker Gegevens </legend>
			                <div class="infoVeld">
			                    <h4> Gebruikersnaam </h4>
			        			<input type="text" name="gebruikersnaam">
			                </div>
			                <div class="infoPaar">
			                    <div class="infoVeld">
			            			<h4> Wachtwoord </h4> 
			            			<input type="text" name="wachtwoord">
			                    </div>
			                    <div class="infoVeld">
			         			    <h4> Herhaal Wachtwoord </h4>
			            			<input type="text" name="wachtwoordHerhaling">
			                    </div>
			                </div>
			            </fieldset>

						<input type="submit" value="Registreer" style="margin:1%;margin-top:0.5%" >
					</form> 
				</div>
			</div>
		</div>

    	<?php include 'footer.php'; ?>
    </body>
<html>