<!DOCTYPE html>
<html>
<head>
	<title>Barry's Bakery - inloggen</title>
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include 'menu.php'; ?>
	<div id="page">
	<div id="text">
    <br /><br /><br />
	<?php

		if(isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
			echo "U bent ingelogd.";
		} else {
			// Inlogdata valideren
			if(!empty ($_POST['email']) && !empty ($_POST['wachtwoord'])) {
			
			// RIJNDER!!!!! Deze 3 lines implementeren de salt. $_POST['wachtwoord'] en $_POST['email'] vervangen door het wachtwoord en de email van jouw pagina
				$salt = "$dbconf->mysql_salt";
				$sha1ww = sha1($_POST['wachtwoord'] . $salt . $_POST['email']);

				$_SESSION['login_success'] = false;

			// Checken met database
				$query = "SELECT Emailadres FROM Klant WHERE Emailadres ='" . $_POST['email'] . "'AND Wachtwoord='" . $sha1ww . "'";
		        $stmt = $db->prepare($query);
		        $stmt->execute();
		        $result = $stmt->fetch(); 

		    // Succesvol inloggen
				if ($result && strlen($result["Emailadres"]) > "0") {
					$query = "SELECT Klant_ID FROM Klant WHERE Emailadres ='" . $_POST['email'] . "'";
					$stmt = $db-> prepare($query);
					$stmt->execute();
					$result = $stmt->fetch();
					
		       		$_SESSION['login_success'] = true;
					$_SESSION['Klant_ID'] = $result['Klant_ID'];
					header('Location: /Mak/index.php');
				} else {
					header('Location: ' . $_SERVER['PHP_SELF']);
				}
			} else {
				if (isset($_SESSION['login_success']) && !$_SESSION['login_success']) {
					echo "Inloggen niet gelukt: "; ?> <br /> <?php
					echo "Foute E-mailadres/wachtwoord combinatie.";
					unset($_SESSION['login_success']);
				}
			// Inloginvoervelden
				echo '
					<h1>Inloggen</h1>
					<form action="<?php print $_SERVER[\'PHP_SELF\']; ?>" method="POST"> 
						E-mailadres: <br>
						<input type="text" name="email"> <br>
						Wachtwoord: <br>
						<input type="password" name="wachtwoord"> <br><br>
						<input type="submit" value="Log in"> <br><br><br>
					</form>
					Nog geen account? <br><br>
					<a href="gebruiker_registreren.php"><button type="button"> Registreer! </button></a>
				';
			}
		}
?>
	</div>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>