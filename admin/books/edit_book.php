<?php 
include '../../private/initialize.php';
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
  /*
  * to fix the syntax sql error along with undefined id
  * https://stackoverflow.com/questions/29331775/updating-of-data-is-not-working-and-undefined-variable-error-when-it-is-defined
  *
  */
  $this_book_id = '';
if(!empty($_GET['p_id'])) {
	$this_book_id = mysqli_real_escape_string($db, $_GET['p_id']);
        //echo $_GET['p_id'];die();
        //$book_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM books LEFT JOIN authors ON books.author_id = authors.author_id LEFT JOIN publishers ON books.publisher_id = publishers.publisher_id LEFT JOIN categories ON books.category_id = categories.category_id WHERE books.book_id = '".$this_book_id."' ";
    $select_book_id = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($select_book_id)) {
        $book_id = $row['book_id'];
        $book_title = $row['book_title'];
		$book_subtitle = $row['book_subtitle'];
		$book_edition = $row['book_edition'];
		$book_author_id = $row['author_id'];
		$book_publisher_id = $row['publisher_id'];
		$book_category_id = $row['category_id'];
		$book_publication_year = $row['publication_year'];
		$book_isbn = $row['book_isbn'];
		$book_url = $row['book_url'];
        $book_cover_link = $row['book_cover_image'];
		$date_read = $row['date_read'];
		$book_notes = $row['book_notes'];
        
    }
update_book();
   

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
			
            <form role="form" class="form-horizontal" method="post" action="edit_book.php?p_id=<?php echo $this_book_id;?>">
			
              <div class="box-body">
			  
			  
                <div class="form-group">
                  <label for="book_title">Book Title</label>
		  <input type="hidden" name="edit_book" value="<?php echo $this_book_id; ?>">
                  <input type="text" class="form-control" id="book_title" name="book_title" value="<?php echo $book_title; ?>" autocomplete = "on">
                </div>
                <div class="form-group">
                  <label for="book_subtitle">Book Subtitle</label>
                  <input type="text" class="form-control" id="book_subtitle" name="book_subtitle" value="<?php echo $book_subtitle; ?>" autocomplete = "on">
                </div>
		
                <div class="form-group">
                  <label for="book_edition">Book Edition</label>
                  <input type="text" class="form-control" id="book_edition" name="book_edition"  value="<?php echo $book_edition; ?>" autocomplete = "on">
                </div>
				
				<!-- select dropdown for authors' names-->
				
				<div class="form-group">
						<label for="author_name">Author</label>
						<select id="author_name" name="author_id" class="form-control">
							<?php
							
								$sel_sql = "SELECT * FROM books LEFT JOIN authors ON books.author_id = authors.author_id WHERE books.book_id = {$this_book_id}";
								$run_sql = mysqli_query($db,$sel_sql);
								//var_dump($run_sql);
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
							<?php
								$sel_sql = "SELECT * FROM books LEFT JOIN publishers ON books.publisher_id = publishers.publisher_id WHERE books.book_id = {$this_book_id}";
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
                  <input type="text" class="form-control" id="publication_year" name="publication_year" value="<?php echo $book_publication_year; ?>" autocomplete = "on">
                </div>
		
                <div class="form-group">
                  <label for="book_isbn">Book ISBN</label>
                  <input type="text" class="form-control" id="book_isbn" name="book_isbn" value="<?php echo $book_isbn; ?>"  autocomplete = "on">
                </div>
				
				<div class="form-group">
                  <label for="book_url">Book URL</label>
                  <input type="text" class="form-control" id="book_url" name="book_url" value="<?php echo $book_url; ?>" autocomplete = "on">
                </div>
				
				<!-- link to Open Library Covers API for relevant image -->
                <div class="form-group">
                  <label for="book_cover_image">Link to Book Cover</label>
                  <input type="text" id="book_cover_image" name="book_cover_image" value="<?php echo $book_cover_link; ?>" autocomplete = "on" class="form-control">
                </div>
				
		<div class="form-group">
                  <label for="date_read">Date Read</label>
                  <input type="date" class="form-control" id="date_read" name="date_read" value="<?php echo $date_read; ?>"  autocomplete = "on">
                </div>
				
				
				
				<!-- textarea/include Summernote here -->
                <div class="form-group">
                  <label for="book_notes">Your Notes</label>
                  <textarea class="form-control" rows="3" id="summernote" name="book_notes"><?php echo $book_notes; ?></textarea>
                </div>
				
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update_book" class="btn btn-primary">Submit</button>
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
