<!DOCTYPE html>
<html>
<head>
	<title>Learning Database</title>
</head>
<body>
	<h1>MySQL with PHP</h1>
	<?php
		$host = "localhost";
		$username = "root";
		$password = "root";
		$database = "wtdb";

		$connection = mysqli_connect($host, $username, $password, $database);
		if (!$connection) {
			echo "Database connection failed";
		}

		$sql = "SELECT * FROM `users` WHERE `id` = '100'";
		$result = mysqli_query($connection, $sql);
		$numOfRows = mysqli_num_rows($result);
		echo $numOfRows."<br />";
		if ($numOfRows == 0) {
			echo "There are no records yet.";
		}
		while ($row = mysqli_fetch_assoc($result)) {
			echo "Welcome ".$row['username'];
			echo "<br />";
		}




		
	?>
</body>
</html>