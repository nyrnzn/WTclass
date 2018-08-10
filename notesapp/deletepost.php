<?php
	$conn = mysqli_connect('localhost', 'root', 'root', 'notesapp');
	if (!$conn) {
		die('Connection failed.');
	}
	$sql = "DELETE FROM `notes` WHERE `id` = '".$_GET['id']."'";
	if (mysqli_query($conn, $sql)) {
		header("location: index.php");
	} else {
		echo "<p>Something went wrong. Please <a href='index.php'>try again</a>.</p>";
	}
?>