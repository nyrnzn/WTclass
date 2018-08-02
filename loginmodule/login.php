<?php
	session_start();
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'yes') {
		echo "logged in";
		header("location: home.php");
	} else {
		echo "not logged in";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<form action="processlogin.php" method="POST">
			<label>
				Username: <input type="text" name="username">
			</label>
			<br><br>
			<label>
				Password: <input type="password" name="password">
			</label>
			<br><br>
			<input type="submit" name="Login">
		</form>
	</body>
</html>