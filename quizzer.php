<?php include 'database.php'; ?>
<?php
/*
 *	Get Total Questions
 */
 $query ="SELECT * FROM questions";
 //Get results
 $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;
?>		
	<?php include 'inc/quiz_header.php'; ?>
		<h2>Test Your PHP Knowledge</h2>
		<p>This is a multiple choice quiz to test your knowledge of PHP</p>
		<ul>
			<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
			<li><strong>Type: </strong>Multiple Choice</li>
			<li><strong>Estimated Time: </strong><?php echo $total * .5; ?> Minutes</li>
		</ul>
		<a href="question.php?n=1" class="start">Start Quiz</a>
		<a href="index.php" class="start">Go Back</a>
	<?php include 'inc/quiz_footer.php'; ?>