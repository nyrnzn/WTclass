<?php
	ob_start();
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'yes') {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register | Notes App</title>
	</head>
	<body>
		<h1>The Notes App</h1>
		<p>Please enter the details below. * denotes required fields.</p>
		<form action="" method="POST">
			<table>
				<tr>
					<td>Full Name*: </td>
					<td><input type="text" name="fullname" placeholder="Enter your full name" required="required"></td>
				</tr>
				<tr>
					<td>Email*: </td>
					<td><input type="email" name="email" placeholder="Enter a valid email address." required="required"></td>
				</tr>
				<tr>
					<td>Password*: </td>
					<td><input type="password" name="password" placeholder="Enter a password" required="required"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="register" value="Register"></td>
				</tr>
			</table>
		</form>

		<?php
			if (isset($_POST['register'])) {
				$conn = mysqli_connect('localhost', 'root', 'root', 'notesapp');
				if (!$conn) {
					die('Connection failed.');
				}
				$sql = 'INSERT INTO `users` (`fullname`, `email`, `password`) VALUES ("'.$_POST['fullname'].'", "'.$_POST['email'].'", "'.sha1($_POST['password']).'")';
				if (mysqli_query($conn, $sql)) {
					echo "Registration successful. Now please <a href='login.php'>login</a>.";
				} else {
					die("Something went wrong. Please try again.");
				}
			}
		?>
	</body>
</html>