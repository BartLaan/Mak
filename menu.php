<div id="header">

		<ul>
			<li>
				<a href="index.php"><img src="images/barrylogo.png" alt="logo" style="width:307.8px;height:70px;"></a></li>
		</ul>
			<br>
			<ul>
				<li class="buttonleft"> 
					<a href="Over_Mak.php"><img src="images/icon_about.png" onmouseover="this.src='images/icon_about_hover.png'" onmouseout="this.src='images/icon_about.png'" alt ="about" style="width:23px; height:23px;"/></a></li>
				<li class="buttonright">
					<a href="contactpagina.php"><img src="images/icon_klantenservice.png" onmouseover="this.src='images/icon_klantenservice_hover.png'" onmouseout="this.src='images/icon_klantenservice.png'" alt="contact" style="width:23px; height:23px;"></a></li>
				<li class="categorie">
					<a href="productCatalogus.php"><img src="images/icon_list.png" onmouseover="this.src='images/icon_list_hover.png'" onmouseout="this.src='images/icon_list.png'" alt ="menu" style="width:23px; height:23px;"/></a>
					<ul>
						<li><a href="productCatalogus.php"> taarten </li>
						<li><a href="productCatalogus.php"> koekjes </li>
						<li><a href="productCatalogus.php"> cupcakes </li>
						<li><a href="productCatalogus.php"> cakes </li>
					</ul>
				</li> 
				<li class="submenu">
					<a href="productCatalogus.php">taarten</a>
					<ul>
						<li><a href="productCatalogus.php">alle taarten</a></li>
						<li><a href="index.php">nieuwe recepten</a></li>
						<li><a href="index.php">populairste taarten</a></li>
						<li><a href="index.php">zelf aan de slag!</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="index.php">koekjes</a>
					<ul>
						<li><a href="index.php">alle koeken</a></li>
						<li><a href="index.php">nieuwe recepten</a></li>
						<li><a href="index.php">populairste koekjes</a></li>
						<li><a href="index.php">zelf aan de slag!</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="index.php">cupcakes</a>
					<ul>
						<li><a href="index.php">alle cupcakes</a></li>
						<li><a href="index.php">nieuwe recepten</a></li>
						<li><a href="menu.html">populairste cupcakes</a></li>
						<li><a href="menu.html">zelf aan de slag!</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="index.php">cakes</a>
					<ul>
						<li><a href="index.php">alle cakes</a></li>
						<li><a href="index.php">nieuwe recepten</a></li>
						<li><a href="index.php">populairste cakes</a></li>
						<li><a href="index.php">zelf aan de slag!</a></li>
					</ul>
				</li>
				<li class="buttonleft">
					<a href="#"><img src="images/icon_account.png" onmouseover="this.src='images/icon_account_hover.png'" onmouseout="this.src='images/icon_account.png'" alt="account" style="width:23px; height:23px;"></a>
					<ul>
						<li class="account">
							<div class="accountmenu"> 
								<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"> 
									Gebruikersnaam <br>
									<input type="text" name="gebruikersnaam"> <br>
									Wachtwoord <br>
									<input type="password" name="wachtwoord"> <br><br>
									<input type="submit" value="Log in"> <br><br><br>
								</form>
								Nog geen account? <br><br>
								<a href="gebruiker_registreren.php"><button type="button"> Registreer! </button></a>
							</div>
						</li>
					</ul>
				</li>
				<li class="buttonright">
					<a href="Winkelwagen.php"><img src="images/icon_winkelwagen.png" onmouseover="this.src='images/icon_winkelwagen_hover.png'" onmouseout="this.src='images/icon_winkelwagen.png'" alt="winkelwagentje" style="width:23px; height:23px;"></a></li>
			</ul>

</div>	
