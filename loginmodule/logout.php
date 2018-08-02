<?php 
	session_start();
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'yes'){
		echo "logged in";
		session_destroy();
		header("location: login.php");
	} else {
		echo "take the user to the login page";
		header("location: login.php");
	}
?>