<?php 
	session_start();
	# connectie met de database maken
	include "database_connect.php";
	# check database voor administratorrechten
	if (isset($_SESSION['Klant_ID'])) {
	    $query = "SELECT Emailadres FROM Klant WHERE Klant_ID='" . $_SESSION['Klant_ID'] . "'AND Administrator=1";
	    $categorie = $db->prepare($query);
	    $categorie->execute();
	    $result = $categorie->fetch(); 
	}
	# https redirect
	if (@$_SERVER['HTTPS'] !== 'on') {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect", true, 301);
		exit();
	}
?>
<div id="header">
		<!-- Barry's logo --> 
		<ul>
			<li>
				<a href="index.php"><img src="images/barrylogo.png" alt="logo" style="width:307.8px;height:70px;"></a></li>
		</ul>
			<br>
		<!-- Menu opties -->
		<ul>
			<li class="buttonleft"> 
				<a href="Over_Mak.php"><img src="images/icon_about.png" onmouseover="this.src='images/icon_about_hover.png'" onmouseout="this.src='images/icon_about.png'" alt ="about" style="width:23px; height:23px;"/></a></li>
			<li class="buttonright">
				<a href="contactpagina.php"><img src="images/icon_klantenservice.png" onmouseover="this.src='images/icon_klantenservice_hover.png'" onmouseout="this.src='images/icon_klantenservice.png'" alt="contact" style="width:23px; height:23px;"></a></li>
			<!-- Dropdown list voor als scherm width kleiner (< 750px) is -->
			<li class="categorie">
				<a href="productCatalogus.php"><img src="images/icon_list.png" onmouseover="this.src='images/icon_list_hover.png'" onmouseout="this.src='images/icon_list.png'" alt ="menu" style="width:23px; height:23px;"/></a>
				<ul>
					<li><a href="productCatalogus.php">Alles</a></li> 
					<li><a href="onaf.php">Zelf ontwerpen </a></li>
					<?php 
					# categorieën ophalen
					$categorieSql = "SELECT DISTINCT Categorie FROM Product" ;
        			$categorie = $db->prepare($categorieSql); 
        			$categorie->execute();
        			while($row =$categorie->fetch() ) {
        				echo '<li><a href="productCatalogus.php">'.$row["Categorie"].'</a></li> ';
    				}
    				?>
				</ul> 
			</li> 
			<!-- Dropdown list voor als scherm width groter (> 750px) is -->
			<li class="submenu">
				<a href="productCatalogus.php">assortiment</a>
				<ul>
					<li><a href="productCatalogus.php">Alles</a></li> 
					<li><a href="onaf.php">Zelf ontwerpen </a></li>

					<?php 
					# categorieën ophalen
					$categorieSql = "SELECT DISTINCT Categorie FROM Product" ;
        			$categorie = $db->prepare($categorieSql); 
        			$categorie->execute();
        			while($row =$categorie->fetch() ) {
        				echo '<li><a href="productCatalogus.php?categorie='.$row["Categorie"].'">'.$row["Categorie"].'</a></li> ';
    				}
    				?>
				</ul> 
			</li> 
			<?php 
			# Drop down inlogformulier, als gebruiker niet is ingelogd
				if(!isset($_SESSION['login_success']) || $_SESSION['login_success'] == false) {
					echo '
						<li class="buttonleft">
							<a href="log_in.php"><img src="images/icon_account.png" onmouseover="this.src="images/icon_account_hover.png" onmouseout="this.src="images/icon_account.png" alt="account" style="width:23px; height:23px;"></a>
							<ul>
								<li class="account">
									<div class="accountmenu"> 
										<form action="log_in.php" method="POST"> 
											E-mailadres: <br>
											<input type="text" name="email"> <br>
											Wachtwoord <br>
											<input type="password" name="wachtwoord"> <br><br>
											<input type="hidden" name="doorverwezen" value="'. $_SERVER['PHP_SELF'] .'">
											<input type="submit" value="Inloggen"> <br><br><br>
										</form>
										Nog geen account? <br><br>
										<a href="gebruiker_registreren.php"><button type="button"> Registreer! </button></a>
									</div>
								</li>
							</ul>
						</li>
					';
				} else {
				# Drop down menu voor ingelogde gebruikers
					echo '
						<li class="buttonleft">
							<a href="gebruikersoverzicht.php"><img src="images/icon_account.png" onmouseover="this.src="images/icon_account_hover.png" onmouseout="this.src="images/icon_account.png" alt="account" style="width:23px; height:23px;"></a>
							<ul>
								<li><a class="accountknop" href="gebruikersoverzicht.php">Uw gegevens</a></li>
								<li> <a class="accountknop" href="bestellingsoverzicht.php">Uw bestellingen </a></li>
					';
					if ($result && strlen($result["Emailadres"]) > "0") {
						echo '
								<li><a class="accountknop" href="Administratorpagina.php">Administratie</a>
						';
					}
						echo '
								<li><a class="accountknop" href="log_out.php">Uitloggen</a></li>
							</ul>
						</li>
					';
				}
			?>
			<!-- Winkelwagen -->
			<li class="buttonright">
				<a href="Winkelwagen.php"><img src="images/icon_winkelwagen.png" onmouseover="this.src='images/icon_winkelwagen_hover.png'" onmouseout="this.src='images/icon_winkelwagen.png'" alt="winkelwagentje" style="width:23px; height:23px;"></a></li>
		</ul>

</div>	
