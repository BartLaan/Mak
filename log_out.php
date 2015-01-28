<!DOCTYPE html>
<html>
<head>
	<title>Barry's Bakery - inloggen</title>
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include 'menu.php';?>
	<div id="page">
    <div id="text">
    <br /> <br /> <br />
	<?php
		if (!isset($_SESSION['login_success']) || !$_SESSION['login_success']) {
			echo "U bent uitgelogd.";
		} else {
			unset($_SESSION['login_success']);
			unset($_SESSION['Klant_ID']);
			header('Location: ' . $_SERVER['PHP_SELF']);
		}
	?>
	</div>
	</div>
<br /><br /><br /><br /><br /><br />
<?php include 'footer.php'; ?>
</body>
</html>