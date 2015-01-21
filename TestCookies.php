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

	if(!empty ($_POST['email'])) {
		$sha1ww = sha1($_POST['wachtwoord']);
		include "database_connect.php";

		$success = false;

        $stmt = $db->prepare(
        	'SELECT 1 FROM Klant WHERE Emailadres =? AND Wachtwoord=' . $_POST['wachtwoord']);
        $stmt->bindValue(11, $_POST['email'], PDO::PARAM_STR); 
        $stmt->execute();


		$sqlww = $stmt->fetch(PDO::FETCH_NUM);
		if ($sqlww) {
			if ($sqlww[0] === "1")
        		$success = true;
    	}
		echo $sqlww[0];
		if ($sqlww[0] !== $sha1ww) {
			echo 'Je moeder';
		} else {
			$_SESSION['email'] = $_POST['email'];
		}
	} else {
		echo 'hoi';
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