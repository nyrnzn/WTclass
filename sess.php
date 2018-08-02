<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Introduction to Session</title>
	</head>
	<body>
		<h1>Sessions</h1>
		<?php
			$_SESSION["name"] = 'Niranjan';
			$_SESSION["address"] = 'Pokhara';
			print_r($_SESSION);
			echo "<br>";
			echo $_SESSION["address"];
			session_destroy();




		?>
	</body>
</html>