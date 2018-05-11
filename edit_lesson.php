<?php include 'lesson_db.php'; ?>
<?php
  // Create Query
  $query = 'SELECT * FROM finals';

  // Get Result
  $result = mysqli_query($mysqli, $query);

  // fetch Data
  $finals = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Free Result
  mysqli_free_result($result);

  // Close Connection
  mysqli_close($mysqli);

	// Check for Submit
	if(isset($_POST['submit'])){
		// Get form data
		$title = mysqli_real_escape_string($mysqli, $_POST['title']);
		$body = mysqli_real_escape_string($mysqli, $_POST['body']);

		$query = "UPDATE finals SET
					title='$title',
					body='$body'";

		if(mysqli_query($mysqli, $query)){
			$msg = 'Lesson has been updated';
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
		<?php foreach($finals as $post) : ?>
		<p>
			<label>Title: </label>
			<input type="text" name="title" value="<?php echo $post['title']; ?>"/>
		</p>
		<p>
			<label>Body: </label>
			<input type="text" name="body" value="<?php echo $post['body']; ?>" />
		</p>
		<p>
			<input type="submit" name="submit" value="Submit" />
		</p>
		<?php endforeach; ?>
	</form>
<?php include 'inc/quiz_footer.php'; ?>