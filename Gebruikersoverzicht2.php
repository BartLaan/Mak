<!DOCTYPE html>

<!-- tabindex 
noscript 
this.form.submit() 
this.find('input[type=submit]').hide
incl excl BTW
echo <<< EOT
EOT;
factuur: Bestelling, Aantal, Omschrijving, Stukprijs, Totaal -->

<html>

	<head>

		<title> Gebruikersgegevens </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

		<style>

			.leftBlock {
				display: block;
				float: left;
				width: 46%;
				margin-left: 4%;
				min-width: 500px;
				overflow: auto;
			}

			.rightBlock {
				display: block;
				float: right;
				width: 46%;
				min-width: 500px;
				overflow: auto;
			}

			h1 {
				text-align: left;
			}

			div h1 {
				margin-top, margin-bottom: 20px;
			}

			noscript h1 {
				text-decoration: underline;
			}

			.field {
				padding: 10px;
				margin: 3px 0 5px 0;
				position: relative;
				width: 75%;
				height: 60px;
			}

			.field:hover {
				border: 2px;
				border-color: #F9F9F9;
			}

			table {
				width: 75%;
				padding: 10px;
				margin: 3px 0 5px 0
			}

			td, th {
				text-align: center;
				padding: 3px;
			}

			th {
				font-weight: bold;
				background-color: #be9b7b;
				height: 50%;
			}

			tr:nth-child(even) {
				background-color: #F9F9F9;
			}

			tr:nth-child(odd) {
				background-color: white;
			}

			td:nth-child(4):hover {
				background-color: #EFEFEF;
			}

			input[type="text"] {
				display: block;
				margin-bottom: 15px;
				width: 65%;
				font-family: sans-serif;
				font-size: 20px;
				appearance: none;
				box-shadow: none;
				border-radius: none;
			}
			
			input[type="text"]:focus {
				outline: none;
			}

			input[type="submit"] {
				display: none;
			}

			.rightBlock input[type="text"] {
				padding: 10px;
				border: solid 1px #dcdcdc;
				transition: box-shadow 0.3s, border 0.3s;
			}

			.rightBlock input[type="text"]:focus, .rightBlock input[type="text"].focus {
				border: solid 1px #707070;
				box-shadow: 0 0 5px 1px #969696;
			}

		</style>

		<script>
			function sendRequest(id, value) {
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} 
				else {
					// code for IE5/6
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("id").value = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "Update_Gebruiker.php?q="+value+"?i="+id, true);
				xmlhttp.send();
				document.getElementById("id").disabled = true;
			}
		</script>

	</head>

	<body>

		<noscript>
			<h1> It appears Javascript is disabled or unsupported by your browser! </h1>
		</noscript>

		<?php include 'menu.php'; ?>

		<!-- lijst met bestellingen en facturen -->
		<div class="leftBlock">
			<h1> Uw bestellingen </h1>

			<table>
				<tr>
					<th>Bestelling ID</th>
					<th>Datum</th>
					<th>Subtotaal</th>
					<th>Factuur</th>
				</tr>
				<tr>
					<td>3453</td>
					<td>sdfs</td>
					<td>234</td>
					<td></td>
				</tr>
				<tr>
					<td>1231</td>
					<td>123</td>
					<td>123</td>
					<td></td>
				</tr>
			</table>
		</div>

		<!-- gebruikersoverzicht en aanpassen van gegevens -->
		<?php
			include 'database_connect.php';
			$sql = 'SELECT Voornaam, Tussenvoegsel, Achternaam, Postcode, Woonplaats, Straat, Huisnummer, Telefoonnummer, Emailadres FROM Klant WHERE Klant_ID = 31';
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();

				echo '<div class="rightBlock">';
					echo '<h1> Uw gebruikersgegevens </h1>';
					echo '<div class="field">';
						echo 'Voornaam: <br />';
						echo '<input type="text" id="Voornaam" onchange="sendRequest(this.id, this.value)" title="Voornaam" name="voornaam" value=$row["Voornaam"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Tussenvoegsel: <br />';
						echo '<input type="text" id="Tussenvoegsel" onchange="sendRequest(this.id, this.value)" title="Tussenvoegsel" name="tussenvoegsel" value=$row["Tussenvoegsel"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Achternaam: <br />';
						echo '<input type="text" id="Achternaam"; onchange="sendRequest(this.id, this.value)" title="Achternaam" name="achternaam" value=$row["Achternaam"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Postcode: <br />';
						echo '<input type="text" id="Postcode" ;onchange="sendRequest(this.id, this.value)" title="Postcode" name="postcode" value=$row["Postcode"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Woonplaats: <br />';
						echo '<input type="text" id="Woonplaats" onchange="sendRequest(this.id, this.value)" title="Woonplaats" name="woonplaats" value=$row["Woonplaats"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Straat: <br />';
						echo '<input type="text" id="Straat" onchange="sendRequest(this.id, this.value)" title="Straat" name="straat" value=$row["Straat"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Huisnummer: <br />';
						echo '<input type="text" id="Huisnummer" onchange="sendRequest(this.id, this.value)" title="Huisnummer" name="huisnummer" value=$row["Huisnummer"] disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Telefoonnummer: <br />';
						echo '<input type="text" id="Telefoonnummer" onchange="sendRequest(this.id, this.value)" title="Telefoonnummer" name="telefoonnummer" value=$row["Telefoonnummer"]disabled onclick="disabled=false">';
					echo '</div>';
					echo '<div class="field">';
						echo 'Emailadres: <br />';
						echo '<input type="text" id="Emailadres" onchange="sendRequest(this.id, this.value)" title="Emailadres" name="emailadres" value=$row["Emailadres"] disabled onclick="disabled=false">';
					echo '</div>';
				echo '</div>';

				$db = null;
		?>

		<?php include 'footer.php'; ?>

	</body>

</html>