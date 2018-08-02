<?php session_start(); ?>
<?php
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'yes'){
		echo "logged in";
	} else {
		echo "take the user to the login page";
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
	</head>
	<body>
		<h1>Welcome</h1>
		<a href="logout.php">Logout</a>
	</body>
</html>