<?php
	ob_start();
	session_start();
	$conn = mysqli_connect('localhost', 'root', 'root', 'notesapp');
	if (!$conn) {
		die('Connection failed.');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to the Notes app</title>
	</head>
	<body>
		<h1>The Notes App</h1>
		<?php if (!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != 'yes'): ?>
			<p>Please <a href="register.php">register</a> to use the app.</p>
			<p>If you already have an account, you can <a href="login.php">login</a> too.</p>
		<?php else: ?>
			<a href="logout.php">Logout</a>
			<hr>
			<h3>Create Notes</h3>
			<?php
				$row['title'] = "";
				$row['content'] = "";
				if (isset($_GET['id'])) {
					$getNotesSql = "SELECT * FROM `notes` WHERE `id` = '".$_GET['id']."'";
					$result = mysqli_query($conn, $getNotesSql);
					$row = mysqli_fetch_assoc($result);
				}
			?>
			<form action="" method="POST">
				<table>
					<tr>
						<td>Title*: </td>
						<td><input type="text" name="title" placeholder="Note's title" required="required" value="<?php echo $row['title']; ?>"></td>
					</tr>
					<tr>
						<td>Content*: </td>
						<td><textarea name="content" placeholder="Note's content" required="required"><?php echo $row['content']; ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="savenote" value="Save"></td>
					</tr>
				</table>
			</form>
			<?php
				if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
					echo "Your note was saved.";
				}
			?>
			<?php
				if (isset($_POST['savenote']) && !isset($_GET['id'])) {
					$sql = "INSERT INTO `notes` (`user_id`, `title`, `content`) VALUES ('".$_SESSION['userId']."', '".$_POST['title']."','".$_POST['content']."')";
					if (mysqli_query($conn, $sql)) {
						header("location:index.php?msg=success");
					} else {
						echo "<p>Something went wrong, please try again.</p>";
					}
				}
				if (isset($_POST['savenote']) && isset($_GET['id'])) {
					$sql = "UPDATE `notes` SET `title` = '".$_POST['title']."', `content` = '".$_POST['content']."' WHERE `id` = '".$_GET['id']."'";
					if (mysqli_query($conn, $sql)) {
						header("location:index.php?msg=success");
					} else {
						echo "<p>Something went wrong, please try again.</p>";
					}
				}
			?>
			<hr>
			<h3>Your Notes</h3>
			<?php
				$getNotesSql = "SELECT * FROM `notes` WHERE `user_id` = '".$_SESSION['userId']."'";
				$result = mysqli_query($conn, $getNotesSql);
			?>
			<?php if (mysqli_num_rows($result) == 0) : ?>
				<p>No content available.</p>
			<?php else: ?>
				<table border="1">
					<tr>
						<th>Title</th>
						<th>Content</th>
						<th>Action</th>
					</tr>
					<?php while ($row = mysqli_fetch_assoc($result)) { ?>
						<tr>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['content']; ?></td>
							<td><a href="index.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="deletepost.php?id=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
					<?php } ?>
				</table>
			<?php endif ?>
		<?php endif ?>
	</body>
</html>