<?php include '../private/initialize.php'; ?>
<?php include SHARED_PATH . '/public_header.php'; ?>
    <!-- Navigation -->
    <?php include SHARED_PATH . '/public_navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
		<h1>Welcome to BookNotes </h1>
  <p class ="lead">This is a reworking of a <a href="https://github.com/rossfion/capstone-project-5" target="_blank">Node.js-based project</a> I built for Udemy Instructor Dr. Angela Yu's <a href="https://www.udemy.com/course/the-complete-web-development-bootcamp/" target="_blank">Web Developer Bootcamp</a>. It is inspired by <a href="https://sive.rs/book" target="_blank">David Siver's own website</a> devoted to documenting all the non-fiction books he has read with some information about them. The covers are courtesy of the <a href="https://openlibrary.org/dev/docs/api/covers" target ="_blank">Open Library Book Covers API</a>. This site is built with core PHP and MySQL. Styling from Bootstrap.</p> 
  <p><a href="https://openlibrary.org/">Courtesy link to the Open Library</a></p>
  <div class ="form-button-container">
  <form method="post" action="/booknotes/most_recent.php"><button class="btn btn-primary btn-btn-small" name="most-recent">Sort by most recent</button></form> | <form method="post" action="/booknotes/titles.php"><button class="btn btn-success btn-btn-small" name="book-titles">Sort by title</button></form>
  </div>
  <hr>
  
  <?php find_all_books(); ?>
            

        </div>
        <!-- /.row -->

        

        <!-- Footer -->
        <?php include SHARED_PATH . '/public_footer.php'; ?>