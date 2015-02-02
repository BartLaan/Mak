<!DOCTYPE html>

<html>
	<head>

		<title>
			Product toevoegen
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
        
            $f = fopen("/tmp/phpLog.txt", "w");

			$PRODUCTNAAMERR = $CATEGORIEERR = $PRIJSERR = $VOORRAADERR = $BESCHRIJVINGERR = $GEWICHTERR = $AFBEELDINGERR = $AANBIEDINGERR = $INFOERR ="";
			$PRODUCTNAAM = $CATEGORIE = $PRIJS = $VOORRAAD = $BESCHRIJVING = $GEWICHT = $AFBEELDING = $AANBIEDING = $INFO ="";
			$CORRECTNESS = TRUE;
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(empty($_POST["naam"])){
					$PRODUCTNAAMERR = "U heeft geen naam ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$PRODUCTNAAM = test_input($_POST["naam"]);
					if(!preg_match("/^[a-zA-Z ]*$/", $PRODUCTNAAM)){
						$PRODUCTNAAMERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["categorie"])){
					$CATEGORIEERR = "U heeft geen categorie ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$CATEGORIE = test_input($_POST["categorie"]);
					if(!preg_match("/^[a-zA-Z ]*$/", $CATEGORIE)){
						$CATEGORIEERR = "Alleen letters en spaties zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["prijs"])){
					$PRIJSERR = "U heeft geen prijs ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$PRIJS = test_input($_POST["prijs"]);
					if(!preg_match("/^-?([0-9]*\.?,?[0-9]+)$/", $PRIJS)){
						$PRIJSERR = "Alleen getallen en komma's zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["voorraad"])){
					$VOORRAADERR = "U heeft geen voorraad ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$VOORRAAD = test_input($_POST["voorraad"]);
					if(!preg_match("/^[0-9]+$/", $VOORRAAD)){
						$VOORRAADERR = "Alleen getallen zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["beschrijving"])){
					$BESCHRIJVINGERR = "U heeft geen beschrijving ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$BESCHRIJVING = test_input($_POST["beschrijving"]);
				}
				if(empty($_POST["gewicht"])){
					$GEWICHTERR = "U heeft het gewicht niet ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$GEWICHT = test_input($_POST["gewicht"]);
					if(!preg_match("/^[0-9]+$/",  $GEWICHT)){
						$GEWICHTERR = "Alleen getallen zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}

				if(empty($_POST["afbeelding"])){
					$AFBEELDINGERR = "U heeft geen afbeelding ingevuld.";
					$CORRECTNESS = FALSE;
				} else{
					$AFBEELDING = test_input($_POST["afbeelding"]);
				}

				if(empty($_POST["aanbieding"])){
					$AANBIEDINGERR = "U heeft niets ingevuld, vul 0.00 is als er geen aanbieding is.";
					$CORRECTNESS = FALSE;
				} else{
					$AANBIEDING = test_input($_POST["aanbieding"]);
					if(!preg_match("/^-?([0-9]*\.?,?[0-9]+)$/", $HOUSE)){
						$AANBIEDINGERR = "Alleen getallen en komma's zijn toegestaan.";
						$CORRECTNESS = FALSE;
					}
				}
				if(empty($_POST["info"])){
					$INFO = "";
				} else{
					$INFO = test_input($_POST["info"]);
				}
				
				// The above is simply checking whether all data matches the given requirements
				if($CORRECTNESS == TRUE){
						$sql = $db->prepare('INSERT INTO Product(Productnaam, Categorie, Prijs, Voorraad, Beschrijving, Gewicht, img_filepath, Aanbieding, SecundaireInfo, Toevoegingsdatum)
											VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
						$sql -> bindValue(1, $PRODUCTNAAM, PDO::PARAM_STR);
						$sql -> bindValue(2, $CATEGORIE, PDO::PARAM_STR);
						$sql -> bindvalue(3, $PRIJS, PDO::PARAM_INT);
						$sql -> bindValue(4, $VOORRAAD, PDO::PARAM_INT);
						$sql -> bindValue(5, $BESCHRIJVING, PDO::PARAM_STR);
						$sql -> bindValue(6, $GEWICHT, PDO::PARAM_INT);
						$sql -> bindValue(7, $AFBEELDING, PDO::PARAM_STR);
						$sql -> bindValue(8, $AANBIEDING, PDO::PARAM_INT);
						$sql -> bindValue(9, $INFO, PDO::PARAM_STR);
						$sql -> bindValue(10, date("Y-m-d H:i:s"), PDO::PARAM_STR);
						$sql -> execute();
					header("location:product_toegevoegd.php");
					//The written data gets put into the database, after which one gets to see that the addition is successful.
				}
			}
			function test_input($DATA){
				$DATA = trim($DATA);
				$DATA = stripslashes($DATA);
				$DATA = htmlspecialchars($DATA);
				return $DATA;
			}
			// This makes sure that the input data won't activate any scripts.
		?>
		<?php include 'menu.php'; ?>
    	<div id="page">
           <div id="text">
          		<div class="center">
					<form method = "post"; action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<h1> Voeg een product toe</h1>
						<div class = "vereistb">
						<p> * velden zijn vereist </p>
						</div> 
						<fieldset>
								<div class="infoVeld">
									<h4> Naam <span style = "color:red"> * <?php echo $PRODUCTNAAMERR;?></span> </h4>
                                    <?php 
									echo '<input type="text" name="naam" value ="' .  $PRODUCTNAAM . '">'; ?>
								</div>
								<div class="infoVeld">
									<h4> Categorie <span style = "color:red"> <?php echo $CATEGORIEERR;?></span> </h4>
									<?php echo '<input type = "text" name = "categorie" value ="' . $CATEGORIE . '">';?>
								</div>
								<div class="infoVeld">
									<h4> Prijs <span style = "color:red"> * <?php echo $PRIJSERR;?></span> </h4>
									<?php echo'<input type="text" name="prijs" value = "'. $PRIJS.'">' ;?>
								</div>
								<div class="infoVeld">
								<h4> Voorraad <span style = "color:red"> * <?php echo $VOORRAADERR;?></span> </h4>
								<?php echo '<input type = "text" name = "voorraad" value ="' . $VOORRAAD . '">';?>
								</div>
								<div class="infoVeld">
									<h4> Beschrijving <span style = "color:red"> * <?php echo $BESCHRIJVINGERR;?></span> </h4>
								<?php echo '<input type = "text" name = "beschrijving" value ="' . $BESCHRIJVING . '">';?>
								</div>
								<div class="infoVeld">
									<h4> Gewicht <span style = "color:red"> * <?php echo $GEWICHTERR;?></span> </h4>
								<?php echo '<input type = "text" name = "gewicht" value ="' . $GEWICHT . '">';?>
								</div>
								<div class="infoVeld">
									<h4> Afbeelding (img_filepath) <span style = "color:red"> * <?php echo $AFBEELDINGERR;?></span> </h4>
								<?php echo '<input type = "text" name = "afbeelding" value ="' . $AFBEELDING . '">';?>

								</div> 
								<div class="infoVeld">
										<h4> Aanbieding <span style = "color:red"> * <?php echo $AANBIEDINGERR;?></span> </h4>
								<?php echo '<input type = "text" name = "aanbieding" value ="' . $AANBIEDING . '">';?>
								</div>
								<div class="infoVeld">
									<h4> Info <span style = "color:red"><?php echo $INFOERR;?></span> </h4>
								<?php echo '<input type = "text" name = "info" value ="' . $INFO . '">';?>
								</div>

						<input type="submit" value="Voeg toe" style="margin:1%;margin-top:-0.5%" >
						<!-- This is the form itself. Not much to write home about, if there's an error it gets displayed, if the form is input incorrectly,
						the input data stays in the form. -->
					</form> 
				</div>
			</div>
		</div>
		<?php include 'footer.php'; ?>
    </body>
<html>