<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php
	session_start();

	if(!empty ($_POST['email'])) {
		$sha1ww = sha1($_POST['wachtwoord']);
		include "database_connect.php";

		$success = false;

		$query = 'SELECT Wachtwoord FROM Klant WHERE Emailadres =' . $_POST['email'];
		$qresult = mysql_query($query)
		if (!qresult) {
			die("Falende query: " . mysql_error());
		}
		$sqlww = mysql_fetch_row($qresult);
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