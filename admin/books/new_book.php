<?php include '../../private/initialize.php';
include SHARED_PATH . '/admin_header.php';?>

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>N</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Book</b>Notes</span>
    </a>
<?php include SHARED_PATH . '/admin_navigation.php';?>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
<?php include SHARED_PATH . '/admin_sidebar.php';?>
    
  </aside>
  
  <?php
if(isset($_POST['submit'])) {
  
        insert_book();

   }
    
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BookNotes
        <small>Welcome to the Admin Area</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
	<!-- Main content -->
    <section class="content container-fluid">
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="new_book.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="book_title">Book Title</label>
				 
                  <input type="text" class="form-control" id="book_title" name="book_title" placeholder="Enter book title" autocomplete = "on">
                </div>
                <div class="form-group">
                  <label for="book_subtitle">Book Subtitle</label>
                  <input type="text" class="form-control" id="book_subtitle" name="book_subtitle"  placeholder="Enter book subtitle" autocomplete = "on">
                </div>
				<div class="form-group">
                  <label for="book_edition">Book Edition</label>
                  <input type="text" class="form-control" id="book_edition" name="book_edition" placeholder="Enter book edition" autocomplete = "on">
                </div>
				
				<!-- select dropdown for authors' names-->
				
				<div class="form-group">
						<label for="author_name">Author</label>
						<select id="author_name" name="author_id" class="form-control">
							<option value="">Select Author</option>
							<?php
								$sel_sql = "SELECT * FROM authors";
								$run_sql = mysqli_query($db,$sel_sql);
								while($rows = mysqli_fetch_assoc($run_sql)){
									
									echo '<option value="'.$rows['author_id'].'">'.ucfirst($rows['author_name']).'</option>';
								}
							?>
						</select>
					</div>
				
                
				
				
				<!-- select dropdown for publishers' names-->
				
                <div class="form-group">
						<label for="publisher_name">Publisher</label>
						<select id="publisher_name" name="publisher_id" class="form-control">
							<option value="">Select Publisher</option>
							<?php
								$sel_sql = "SELECT * FROM publishers";
								$run_sql = mysqli_query($db,$sel_sql);
								while($rows = mysqli_fetch_assoc($run_sql)){
									
									echo '<option value="'.$rows['publisher_id'].'">'.ucfirst($rows['publisher_name']).'</option>';
								}
							?>
						</select>
					</div>
				
				<!-- select dropdown for categories-->
				
                <div class="form-group">
						<label for="category_name">Category</label>
						<select id="category_name" name="category_id" class="form-control">
							<option value="">Select Category</option>
							<?php
								$sel_sql = "SELECT * FROM categories";
								$run_sql = mysqli_query($db,$sel_sql);
								while($rows = mysqli_fetch_assoc($run_sql)){
									
									echo '<option value="'.$rows['category_id'].'">'.ucfirst($rows['category_name']).'</option>';
								}
							?>
						</select>
					</div>
				
				<div class="form-group">
                  <label for="publication_year">Year of Publication</label>
                  <input type="text" class="form-control" id="publication_year" name="publication_year" placeholder="Enter publication_year as 4 digits" autocomplete = "on">
                </div>
				<div class="form-group">
                  <label for="book_isbn">Book ISBN</label>
                  <input type="text" class="form-control" id="book_isbn" name="book_isbn" placeholder="Enter book ISBN" autocomplete = "on">
                </div>
				<div class="form-group">
                  <label for="book_url">Book URL</label>
                  <input type="text" class="form-control" id="book_url" name="book_url" placeholder="Enter book URL" autocomplete = "on">
                </div>
				
				
				
				<!-- link to Open Library Covers API for relevant image link-->
                <div class="form-group">
                  <label for="book_cover_image">Link to Book Cover</label>
                  <input type="text" id="book_cover_image" name="book_cover_image" autocomplete = "on" class="form-control">
                </div>
				
				<div class="form-group">
                  <label for="date_read">Date Read</label>
                  <input type="date" class="form-control" id="date_read" name="date_read" placeholder="Enter the date you finished reading this book" autocomplete = "on">
                </div>
				
				
				<!-- textarea/include Summernote or other text editor here -->
                <div class="form-group">
                  <label for="book_notes">My Notes</label>
                  <textarea class="form-control" rows="3" id="summernote" name="book_notes" placeholder="Enter my notes about this book ..."></textarea>
				  
                </div>
				
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
  <?php include SHARED_PATH . '/admin_footer.php';?>