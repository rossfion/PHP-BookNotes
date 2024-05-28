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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!--<h3 class="box-title">Responsive Hover Table</h3>-->
<a class="btn btn-primary" href="new_book.php">Add a New Book</a>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			
              <table class="table table-hover">
                <tr>
                  <th>Book ID</th>
                  <th>Book Title</th>
                  <th>Author</th>
		  <th>Publisher</th>
		  <th>Category</th>
                  <th>Publication Year</th>
                  <th>Cover Image</th>
		  <th>Date Read</th>
		  <th>Actions</th>
                </tr>
				
				<?php // display all books
                $query = "SELECT books.*, authors.*, publishers.*, categories.* FROM books LEFT JOIN authors ON books.author_id = authors.author_id LEFT JOIN publishers ON books.publisher_id = publishers.publisher_id LEFT JOIN categories ON books.category_id = categories.category_id ORDER BY books.book_id ASC";

                $select_all_books_query = mysqli_query($db, $query);

                while ($row = mysqli_fetch_assoc($select_all_books_query)) {
                    $book_id = $row['book_id'];
                    $book_title = $row['book_title'];
                    $author_name = $row['author_name'];
                    $publisher_name = $row['publisher_name'];
                    $category_name = $row['category_name'];
                    $publication_year = $row['publication_year'];
                    $book_cover_image = $row['book_cover_image'];
                    $date_read = $row['date_read'];
                    ?>

                <tr>
                  <td><?php echo $book_id;?></td>
                  <td><?php echo $book_title;?></td>
		  <td><?php echo $author_name;?></td>
		  <td><?php echo $publisher_name;?></td>
                  <td><?php echo $category_name;?></td>
                  <td><?php echo $publication_year;?></td>
                  <td><?php echo $book_cover_image;?></td>
		  <td><?php echo $date_read;?></td>				  
		  <td><a class="btn btn-info" href="/booknotes/admin/books/edit_book.php?p_id=<?php echo $book_id;?>">Edit</a></td>
		
           <td><a class='btn btn-danger' onClick=\" javascript: return confirm('Are you sure you want to delete this book entry?'); \"  href='/booknotes/admin/books/index.php?delete=<?php echo $book_id;?>'>Delete</a></td>
                </tr>
				<?php } ?>
              </table>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php if (isset($_GET['delete'])) {
	  
    $delete_book_id = $_GET['delete'];

    $query = "DELETE FROM books WHERE book_id = {$delete_book_id}";

    $delete_book_query = mysqli_query($db, $query);
    redirect_to("/booknotes/admin");
}
?>

  <?php include SHARED_PATH . '/admin_footer.php';?>
  