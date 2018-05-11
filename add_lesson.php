<?php include 'lesson_db.php'; ?>
<?php
	// Check for Submit
	if(isset($_POST['submit'])){
		// Get form data
		$title = mysqli_real_escape_string($mysqli, $_POST['title']);
		$body = mysqli_real_escape_string($mysqli, $_POST['body']);

		$query = "INSERT INTO `finals`(title, body) VALUES('$title', '$body')";

		if(mysqli_query($mysqli, $query)){
			$msg = 'Lesson has been added';
		} else {
			echo 'ERROR: '. mysqli_error($mysqli);
		}
	}

?>
<?php include 'inc/quiz_header.php'; ?>
	<h1>Add A Lesson</h1>
	<?php
		if(isset($msg)){
			echo '<p>'.$msg.'</p>';
		}
	?>
	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<p>
			<label>Title: </label>
			<input type="text" name="title" />
		</p>
		<p>
			<label>Body: </label>
			<input type="text" name="body" />
		</p>
		<p>
			<input type="submit" name="submit" value="Submit" />
		</p>
	</form>
<?php include 'inc/quiz_footer.php'; ?>