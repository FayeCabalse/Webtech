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
?>
<?php include 'inc/header.php'; ?>
            <div class="mb-5 element-animate">
              <h1>FINALS</h1>
              <p class="lead">Learn all about the topics from the finals term.</p>
            </div>           
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
  <?php foreach($finals as $post) : ?>
  <button class="coll"><h3><?php echo $post['title']; ?></h3></button>
  <div class="panel">
    <?php echo $post['body']; ?>
        </div> 
    <?php endforeach; ?>
  </div>
    <?php include 'inc/footer.php'; ?>