<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php

	if (@$_SERVER['HTTPS'] !== 'on') {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect", true, 301);
		exit();
	}

	session_start();

	if(!empty ($_POST['email']) && !empty ($_POST['wachtwoord'])) {
		$sha1ww = sha1($_POST['wachtwoord']);
		include "database_connect.php";

		$_SESSION['login_success'] = false;

		$query = "SELECT * FROM Klant WHERE Emailadres ='" . $_POST['email'] . "'AND Wachtwoord='" . $sha1ww . "'";
        $stmt = $db->prepare($query);
        $stmt->execute();

		$result = $stmt->fetch(); 
		if ($result && strlen($result["Emailadres"]) > "0") {
			echo "Inloggen gelukt";
       		$_SESSION['login_success'] = true;
			$_SESSION['email'] = $_POST['email'];
		} else {
			header('Location: ' . $_SERVER['PHP_SELF']);
		}
	} else {
		if (isset($_SESSION['login_success']) && !$_SESSION['login_success']) {
			echo "Inloggen niet gelukt: \n Foute E-mailadres/wachtwoord combinatie.";
			unset($_SESSION['login_success']);
		}
		echo <<<EOT
<!DOCTYPE html>
<html>
<head>
<title>Inloggen</title>
</head>
<body>
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
?>
</body>
</html>