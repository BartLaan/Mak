 <!DOCTYPE html>

<html>

	<body>

		<?php
			$q = strval($_GET['q']);
			$i = intval($_GET['i']);

			include 'database_connect.php';
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = 'UPDATE Klant SET $i = $q WHERE KLANT_ID = 31';
			$stmt = $db->prepare($sql);
			$stmt->execute();
			print "alert('Updated ' . $i . ' succesfully to ' . $q . '!')";
			$db->close();
		?>

	</body>

</html>