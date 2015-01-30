<!DOCTYPE html>
<html>
<head>
	<title>Barry's Bakery - inloggen</title>
	<link href="opmaak.css" rel="stylesheet" type="text/css" />
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include 'menu.php'; ?>
	<div id="page">
	<div id="text">
    <br /><br /><br />
	<?php

		if(isset($_POST['doorverwezen'])) 
		{
			$_SESSION['doorverwezen'] = $_POST['doorverwezen'];
		}

		if(isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) 
		{
			echo "<h1>U bent ingelogd.</h1>";
		} else {
			// Inlogdata valideren
			if(!empty ($_POST['email']) && !empty ($_POST['wachtwoord'])) {
			
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
					if (isset($_SESSION['doorverwezen']) && $_SESSION['doorverwezen'] != "/Mak/log_out.php") {
						echo "<script>window.alert('". $_SESSION['doorverwezen'] ."');</script>";
						$doorverwezen = $_SESSION['doorverwezen'];
						unset($_SESSION['doorverwezen']);
						header('Location: '. $doorverwezen);
					} else {
						header('Location: /Mak/index.php');
					}
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
					<h1 style="text-align:left">Inloggen</h1>
					<form action="'. $_SERVER['PHP_SELF'] .'" method="POST"> 
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