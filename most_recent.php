<?php include '../private/initialize.php'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>
    <!-- Navigation -->
    <?php include SHARED_PATH . '/public_navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
		<h1>Most Recent Books </h1>
  <?php get_most_recent_books(); ?>
  </div>
  
  
            

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include SHARED_PATH . '/public_footer.php'; ?>