<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php
	session_start();

	if(empty ($_POST['email'])) {
		echo 'bliep';
		$sha1ww = sha1($_POST['wachtwoord']);
		include "database_connect.php";
		$sqlww = 'SELECT Wachtwoord FROM Klant WHERE Emailadres ="' . $_POST['email']'"';
		$success = false;
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
<form action="{$_SERVER['PHP_SELF']}" method="post">
E-mail: <input type="text" name="email"><br>
Wachtwoord: <input type="password" name="wachtwoord"><br>
<input type="submit" value="Log in">
</form>
</body>
</html>
EOT;
	}
?>
</body>
</html>