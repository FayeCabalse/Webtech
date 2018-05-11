<?php session_start(); ?>
	<?php include 'inc/quiz_header.php'; ?>
		<h2>You're Done!</h2>
			<p>Congrats! You have completed the test</p>
			<p>Final Score: <?php echo $_SESSION['score']; ?></p>
			<a href="quizzer.php" class="start">Take Again</a>
			<a href="index.php" class="start">Go Back</a>
	<?php include 'inc/quiz_footer.php'; ?>
<?php session_destroy(); ?>