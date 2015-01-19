<!DOCTYPE html>
<head>
</head>

<body>
<?php
	session_start();
?>
<form action="index.php" method="post">
E-mail: <input type="text" name="email"><br>
Wachtwoord: <input type="password" name="wachtwoord"><br>
<input type="submit" value="log in">
</form>
<?php
	$sha1ww = sha1($_POST['wachtwoord']);
	include "database_connect.php";
	$sqlww = 'SELECT Wachtwoord FROM Klanten WHERE Emailadres =' . $_POST['email'];
	if ($sqlww !== $sha1ww) {
		echo 'Je moeder';
	} else {
		$_SESSION['email'] = $_POST['email'];
	}
?>
</body>
</html>