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
<?php
	$_SESSION['email'] = $_POST['email'];
?>
</form>
</body>
</html>