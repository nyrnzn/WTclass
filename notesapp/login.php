<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login | Notes App</title>
	</head>
	<body>
		<h1>The Notes App</h1>
		<p>Enter your credentials below to login.</p>
		<form method="POST" action="">
			<table>
				<tr>
					<td>Email: </td>
					<td><input type="email" name="email" placeholder="Enter your email." required="required"></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="password" placeholder="Enter your password" required="required"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Login"></td>
				</tr>
			</table>
		</form>

		<?php
			if (isset($_POST['submit'])) {
				$conn = mysqli_connect('localhost', 'root', 'root', 'notesapp');
				if (!$conn) {
					die('Connection failed.');
				}
				$sql = "SELECT * FROM `users` WHERE `email` = '".$_POST['email']."' AND `password` = '".sha1($_POST['password'])."'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					$_SESSION['loggedin'] = 'yes';
					$_SESSION['userId'] = $row['id'];
					header('location: index.php');
				} else {
					die("Email or password incorrect.");
				}
			}
		?>
	</body>
</html>