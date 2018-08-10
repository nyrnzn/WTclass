<?php include('header.php'); ?>
	<p>This is home page.</p>
	<?php
		$password = "thisIsMyPass";
		$enteredPassword = "thisIsMyPass";
		echo "Original Password: ".$password;
		echo "<br/>";
		// md5()
		echo "Password after encryption: ".sha1($password);
		echo "<br />";
		echo "Entered Password after encryption: ".sha1($enteredPassword);
	?>
<?php include('footer.php'); ?>