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
                margin: 1%;
                clear: both;
                width: 40%;


            .infoPaar
            {
                clear:both;
            }

            .infoVeld
            {
                margin-right: 5%;
                float:left;
            }

            .infoVeld input[type = "text"] 
            {
                width:100%;
            }
			
			.vereistb{
				color: red;
				margin: 1%;
			
			.vereist{
				color: red;
			}
			
            .center
            {
                margin-top:20%;
            }
                
                
            form {
            	text-align: center;
            }

        </style>

	</head>

    <body>
		<?php
			$FIRSTNAMEERR = $TUSSENVOEGSELERR = $LASTNAMEERR = $GENDERERR = $DOMERR = $ZIPERR = $STREETERR = $HOUSEERR = $MAILERR = $PHONEERR = $PASSERR = $PASS2ERR = "";
			$FIRSTNAME = $TUSSENVOEGSEL = $LASTNAME = $GENDER = $GENDERHELPER = $DOM = $ZIP = $STREET = $HOUSE = $MAIL = $PHONE = $PASS = $PASS2 = "";
			$CORRECTNESS = TRUE;
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				include 'database_connect.php';
				if(empty($_POST["voornaam"])){
					$FIRSTNAMEERR = "U heeft uw voornaam niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$FIRSTNAME = test_input($_POST["voornaam"]);
					if(!preg_match("/^[a-zA-Z ]*$/", $FIRSTNAME)){
						$FIRSTNAMEERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["tussenvoegsel"])){
					$TUSSENVOEGSEL = "";
				} else{
					$TUSSENVOEGSEL = test_input($_POST["tussenvoegsel"]);
					if(!preg_match("/^[a-zA-Z ]*$/", $TUSSENVOEGSEL)){
						$TUSSENVOEGSELERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["achternaam"])){
					$LASTNAMEERR = "U heeft uw achternaam niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$LASTNAME = test_input($_POST["achternaam"]);
					if(!preg_match("/^[a-zA-z ]*$/", $LASTNAME)){
						$LASTNAMEERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["geslacht"])){
					$GENDERERR = "U heeft geen geslacht gekozen.";
					$CORRECTNESS = FALSE;
				} else{
					$GENDER = test_input($_POST["geslacht"]);
					if(!preg_match("/^[a-zA-z ]*$/", $GENDER)){
						$GENDERERR = "Bedenk alstublieft niet zelf geslachten.";
						$CORRECTNESS = FALSE;
					}
					else if($GENDER == "overig"){
						$GENDERHELPER = "0";
					}
					else if($GENDER == "man"){
						$GENDERHELPER = "1";
					}
					else if($GENDER == "vrouw"){
						$GENDERHELPER = "2";
					}
				}
				if(empty($_POST["woonplaats"])){
					$DOMERR = "U heeft geen woonplaats ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$DOM = test_input($_POST["woonplaats"]);
					if(!preg_match("/^[a-zA-z ]*$/", $DOM)){
						$DOMERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["postcode"])){
					$ZIPERR = "U heeft uw postcode niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$ZIP = test_input($_POST["postcode"]);
					if(!preg_match("/^[a-zA-z0-9]*$/", $ZIP)){
						$ZIPERR = "Alleen letters en cijfers zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["straat"])){
					$STREETERR = "U heeft uw straatnaam niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$STREET = test_input($_POST["straat"]);
					if(!preg_match("/^[a-zA-z ]*$/", $STREET)){
						$STREETERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["huisnummer"])){
					$HOUSEERR = "U heeft uw huisnummer niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$HOUSE = test_input($_POST["huisnummer"]);
					if(!preg_match("/^[a-zA-z0-9]*$/", $HOUSE)){
						$HOUSEERR = "Alleen letters en cijfers zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["telefoonnummer"])){
					$PHONE = "";
				} else{
					$PHONE = test_input($_POST["telefoonnummer"]);
					if(!preg_match("/^[0-9]*$/", $PHONE)){
						$PHONEERR = "Alleen cijfers zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["email"])){
					$MAILERR = "U heeft uw emailadres niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$MAIL = test_input($_POST["email"]);
					if(!filter_var($MAIL, FILTER_VALIDATE_EMAIL)){
						$MAILERR = "Dit emailadres is niet correct.";
						$CORRECTNESS = FALSE;
					}
					else{
						$sqlmail = "SELECT Emailadres FROM Klant WHERE Emailadres =" . $MAIL; 
						$othermail = $db -> query($sqlmail);
						
						foreach($othermail as $test )
						{
							if (strlen($test["Emailadres"]) > 0 )
							{
								die("Dit emailadres is al gebruikt!");
							}
						}
						
						if(mysql_num_rows($othermail) > 0){
							$MAILERR = "Dit emailadres is al geregistreerd.";
							$CORRECTNESS = FALSE;
						}
					}
				}
				if(empty($_POST["wachtwoord"])){
					$PASSERR = "U heeft geen wachtwoord ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$PASS = test_input($_POST["wachtwoord"]);
					if(!preg_match("/^[-a-zA-z0-9 !@#$^&*()_]*$/", $PASS)){
						$PASSERR = "Uw wachtwoord mag alleen letters, cijfers, spaties en !@#$^&*()_ bevatten.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["wachtwoordHerhaling"])){
					$PASS2ERR = "U moet uw wachtwoord nog herhalen.";
					$CORRECTNESS = FALSE;
				} else{
					$PASS2 = test_input($_POST["wachtwoordHerhaling"]);
					if($PASS != $PASS2){
						$PASS2ERR = "De wachtwoorden komen niet met elkaar overeen.";
						$CORRECTNESS = FALSE;
					}
				}
				if($CORRECTNESS == TRUE){

						$sql = $db->prepare('INSERT INTO Klant(Voornaam, Tussenvoegsel, Achternaam, Geslacht, Straat, Huisnummer, Postcode, Woonplaats, Telefoonnummer, Emailadres, Wachtwoord)
											VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
						$sql -> bindValue(1, $FIRSTNAME, PDO::PARAM_STR);
						$sql -> bindValue(2, $TUSSENVOEGSEL, PDO::PARAM_STR);
						$sql -> bindvalue(3, $LASTNAME, PDO::PARAM_STR);
						$sql -> bindValue(4, $GENDER, PDO::PARAM_INT);
						$sql -> bindValue(5, $STREET, PDO::PARAM_STR);
						$sql -> bindValue(6, $HOUSE, PDO::PARAM_STR);
						$sql -> bindValue(7, $ZIP, PDO::PARAM_STR);
						$sql -> bindValue(8, $DOM, PDO::PARAM_STR);
						$sql -> bindValue(9, $PHONE, PDO::PARAM_STR);
						$sql -> bindValue(10, $MAIL, PDO::PARAM_STR);
						$sql -> bindValue(11, $PASS, PDO::PARAM_STR);
						$sql -> execute();
					header("location:registratie_geslaagd.php");
				}
                else
                {
                }
			}
			function test_input($DATA){
				$DATA = trim($DATA);
				$DATA = stripslashes($DATA);
				$DATA = htmlspecialchars($DATA);
				return $DATA;
			}
		?>
		<?php include 'menu.php'; ?>
    	<div id="page">
           <div id="text">
          		<div class="center">
					<form method = "post"; action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<h1> Mak Uw Account </h1>
						<div class = "vereistb">
						<p> * velden zijn vereist </p>
						</div> 
						<fieldset>
							<legend>Persoonlijke Informatie</legend>
							<div class="infoPaar">
								<div class="infoVeld">
									<h4> Voornaam <span style = "color:red"> * <?php echo $FIRSTNAMEERR;?></span> </h4>
                                    <?php 
									echo '<input type="text" name="voornaam" value ="' .  $FIRSTNAME . '">'; ?>
								</div>
								<div class="infoVeld">
									<h4> Tussenvoegsel <span style = "color:red"> <?php echo $TUSSENVOEGSELERR;?></span> </h4>
									<?php echo '<input type = "text" name = "tussenvoegsel" value ="' . $TUSSENVOEGSEL . '">';?>
								</div>
								<div class="infoVeld">
									<h4> Achternaam <span style = "color:red"> * <?php echo $LASTNAMEERR;?></span> </h4>
									<input type="text" name="achternaam" value = "<?php echo $LASTNAME;?>">
								</div>
							</div>
							<div class="infoPaar">
								<div class="infoVeld">
								<h4> Geslacht <span style = "color:red"> * <?php echo $GENDERERR;?></span> </h4>
									<select name = "geslacht">
									<option value = "overig" <?php if($GENDER == "overig"){echo 'selected = "selected"';}?>> Overig </option>
									<option value = "man" <?php if($GENDER == "man"){echo 'selected = "selected"';}?>> Man </option>
									<option value = "vrouw" <?php if($GENDER == "vrouw"){echo 'selected = "selected"';}?>> Vrouw </option>
									</select>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend> Adres Gegevens </legend>
							<div class="infoPaar">
								<div class="infoVeld">
									<h4> Woonplaats <span style = "color:red"> * <?php echo $DOMERR;?></span> </h4>
									<input type="text" name="woonplaats" value = "<?php echo $DOM;?>">
								</div>
								<div class="infoVeld">
									<h4> Postcode <span style = "color:red"> * <?php echo $ZIPERR;?></span> </h4>
									<input type="text" name="postcode" maxlength = "10" value = "<?php echo $ZIP;?>">
								</div>
							</div>
							<div class="infoPaar">
								<div class="infoVeld">
									<h4> Straat <span style = "color:red"> * <?php echo $STREETERR;?></span> </h4>
										<input type="text" name="straat" value = "<?php echo $STREET;?>">
								</div> 
								<div class="infoVeld">
										<h4>Huisnummer <span style = "color:red"> * <?php echo $HOUSEERR;?></span> </h4>
									<input type="text" name="huisnummer"  maxlength="5" value = "<?php echo $HOUSE;?>">
								</div>
							</div>
						</fieldset>


						<fieldset>
							<legend> Contact Informatie </legend>
							<div class="infoPaar">
								<div class="infoVeld">
									<h4> Telefoonnummer <span style = "color:red"><?php echo $PHONEERR;?></span> </h4>
									<input type="text" name="telefoonnummer" value = "<?php echo $PHONE;?>">
								</div>
								<div class="infoVeld">
									<h4> Emailadres <span style = "color:red"> * <?php echo $MAILERR;?></span> </h4>
									<input type="text" name="email" value = "<?php echo $MAIL;?>">
								</div>
						</fieldset>

						<fieldset>
							<legend> Gebruiker Gegevens </legend>
							<div class="infoPaar">
								<div class="infoVeld">
									<h4> Wachtwoord <span style = "color:red"> * <?php echo $PASSERR;?></span> </h4> 
									<input type="password" name="wachtwoord" value = "<?php echo $PASS;?>">
								</div>
								<div class="infoVeld">
									<h4> Herhaal Wachtwoord <span style = "color:red"> * <?php echo $PASS2ERR;?></span> </h4>
									<input type="password" name="wachtwoordHerhaling" value = "<?php echo $PASS2;?>">
								</div>
							</div>
						</fieldset>

						<input type="submit" value="Registreer" style="margin:1%;margin-top:-0.5%" >
					</form> 
				</div>
			</div>
		</div>
    </body>
<html>