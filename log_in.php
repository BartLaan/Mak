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
    <br />
	<?php

		if (@$_SERVER['HTTPS'] !== 'on') {
			$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			header("Location: $redirect", true, 301);
			exit();
		}
		session_start();
		// 
		if(isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
			echo "U bent al ingelogd.";
		} else {
			// Inlogdata valideren
			if(!empty ($_POST['email']) && !empty ($_POST['wachtwoord'])) {
			
				$sha1ww = sha1($_POST['wachtwoord']);

				include "database_connect.php";
				$salt = $dbconf->mysql_salt;

				$_SESSION['login_success'] = false;

				$query = "SELECT * FROM Klant WHERE Emailadres ='" . $_POST['email'] . "'
					AND Wachtwoord='" . $sha1ww . $salt . $_SESSION['email'] . "'";
		        $stmt = $db->prepare($query);
		        $stmt->execute();

				$result = $stmt->fetch(); 
				if ($result && strlen($result["Emailadres"]) > "0") {
					echo "U bent nu ingelogd.";
		       		$_SESSION['login_success'] = true;
					$_SESSION['email'] = $_POST['email'];
				} else {
					header('Location: ' . $_SERVER['PHP_SELF']);
				}
			} else {
				if (isset($_SESSION['login_success']) && !$_SESSION['login_success']) {
					echo "Inloggen niet gelukt: "; ?> <br /> <?php
					echo "Foute E-mailadres/wachtwoord combinatie.";
					unset($_SESSION['login_success']);
				}
			// Inloginvoerdingen
				echo <<<EOT
<!DOCTYPE html>
<html>
<head>
<title>Inloggen</title>
</head>
<body>
<h1>Inloggen</h1>
<form action="{$_SERVER['PHP_SELF']}" method="POST"> 
E-mailadres: <br>
<input type="text" name="email"> <br>
Wachtwoord <br>
<input type="password" name="wachtwoord"> <br><br>
<input type="submit" value="Log in"> <br><br><br>
</form>
Nog geen account? <br><br>
<a href="gebruiker_registreren.php"><button type="button"> Registreer! </button></a>
</form>
</body>
</html>
EOT;
			}
		}
?>
	</div>
	</div>
</body>
</html>