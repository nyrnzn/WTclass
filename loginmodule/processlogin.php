<?php
	session_start();
	$username = $_POST['username'] ;
	$password = $_POST['password'] ;
	
	$authUsername = 'niranjan';
	$authPassword = 'gces';

	if ($username == $authUsername && $password == $authPassword) {
		echo "logged in";
		$_SESSION['loggedIn'] = 'yes';
		header("location: home.php");
	} else {
		echo "Wrong username or password";
		echo "<br /><a href='login.php'>Try logging in again</a>";
	}
?>