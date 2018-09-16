<!--
	A solution to this question:
	Write a serverside script for user registration having input field username, password, email, phone with a proper client-side validation.
-->
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		label {
			display: block;
			margin: 10px;
		}
	</style>
</head>
<body>
	<h1>Registration</h1>
	<p>All fields are required.</p>
	<form action="" method="POST" onsubmit="return validateForm();">
		<label>
			Username: <input type="text" name="username" id="username">
		</label>
		<label>
			Password: <input type="password" name="password" id="password">
		</label>
		<label>
			Email: <input type="text" name="email" id="email">
		</label>
		<label>
			Phone No.: <input type="text" name="phone" id="phone">
		</label>
		<input type="submit" name="submit" value="Register">
	</form>
	<p id="error"></p>
	<script type="text/javascript">
		function validateForm() {
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			var email = document.getElementById('email').value;
			var phone = document.getElementById('phone').value;
			var error = document.getElementById('error');

			if (username == '' || password == '' || email == '' || phone == '') {
				error.textContent = 'Please enter all required fields.';
				return false;
			}

			var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
			var phoneRegex = /^[0-9]+$/;

			if(!emailRegex.test(email)){
				error.textContent = 'Please enter valid email address.';
				return false;
			}
			if(!phoneRegex.test(phone)){
				error.textContent = 'Phone number can only have numbers.';
				return false;
			}

			error.textContent = '';
		}
	</script>
	<?php
		if (isset($_POST['submit'])) {
			$dbHost = "localhost";
			$dbUsername = "root";
			$dbPassword = "root";
			$dbName = "examquestion";
			$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$sql = "INSERT INTO `users` (username, password, email, phone) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['phone']."')";

			if(mysqli_query($conn, $sql)){
				echo "Registration successful";
			} else {
				echo "Something went wrong. Please try again.";
			}

			mysqli_close($conn);
		}
	?>
</body>
</html>
