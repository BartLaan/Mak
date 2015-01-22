<!DOCTYPE html>
<html>
<head>
	<title>Dit is een testpagina</title>
</head>
<body>
<?php 
	session_start();

	if(isset($_SESSION['email'])) {
		echo $_SESSION['email'];
	} else {
		echo "email is not set";
	}
?> <br /> <?php
	if(isset($_SESSION['login_success'])) {
		if($_SESSION['login_success'] == true) {
			echo "login_success is true";
		} else {
			echo "login_success is false";
		}
	} else {
		echo "login_success is not set";
	}
?>
</body>
</html>