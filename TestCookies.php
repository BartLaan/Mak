<!DOCTYPE html>
<head>
</head>

<body>
<?php
	session_start();

	if(!empty ($_POST['username'])) {
		$sha1ww = sha1($_POST['wachtwoord']);
		include "database_connect.php";
		$sqlww = 'SELECT Wachtwoord FROM Klanten WHERE Emailadres =' . $_POST['email'];
		$success = false;
		if ($sqlww[0] !== $sha1ww) {
			echo 'Je moeder';
		} else {
			$_SESSION['email'] = $_POST['email'];
		}
	} else {
		echo <<<E0T
<!DOCTYPE html>
<html>
<head>
<title>Inloggen</title>
</head>
<body>
<form action="{$_SERVER['PHP_SELF']}" method="post">
E-mail: <input type="text" name="email"><br>
Wachtwoord: <input type="password" name="wachtwoord"><br>
<input type="submit" value="log in">
</form>
</body>
</html>
E0T;
?>
</body>
</html>