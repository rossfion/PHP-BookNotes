<?php

// query functions for the admin area

function book_query($query) {
    global $db;
    return mysqli_query($db, $query);
}


function book_confirm_query($result_set) {

    global $db;
    if (!$result_set) {
        die("QUERY FAILED ." . mysqli_error($db));
    }
}

//==== Categories CRUD ====//
function insert_category() {
    global $db;

    if (isset($_POST['submit'])) {
        $category_name = $_POST['category_name'];

        if ($category_name == "" || empty($category_name)) {
            echo "This field cannot be empty";
        } else {

            $book_query = "INSERT INTO categories(category_name) ";
            $book_query .= "VALUES('{$category_name}')";

            $create_category_query = mysqli_query($db, $book_query);

            if (!$create_category_query) {
                die("QUERY FAILED" . mysqli_error());
            }
        }
    }
}

function find_all_categories() {
    global $db;
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($db, $query);
	book_confirm_query($select_all_categories);

while ($row = mysqli_fetch_assoc($select_all_categories)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];

        echo "<tr>";
        echo "<td>{$category_id}</td>";
        echo "<td>{$category_name}</td>";
        echo "<td><a href='/booknotes/admin/categories/index.php?edit={$category_id}'>EDIT</a>
                                </td>";
        echo "<td><a href='/booknotes/admin/categories/index.php?delete={$category_id}'>DELETE</a>
                                </td>";

        echo "</tr>";
    }
    
	
}

function update_category() {
    global $db;

    if (isset($_GET['edit'])) {
        $category_id = $_GET['edit'];

        include 'update_category.php';
    }
}

function delete_category() {
    global $db;

    if (isset($_GET['delete'])) {
        $category_id = $_GET['delete'];

        $book_query = "DELETE FROM categories WHERE category_id = {$category_id}";

        $delete_query = mysqli_query($db, $book_query);

        redirect_to("/booknotes/admin/categories");
    }
}

//==== End Categories CRUD ====//

//==== Books CRUD ====//

function insert_book() {
    global $db;

    
    $book_title = $_POST['book_title'];
	$book_subtitle = $_POST['book_subtitle'];
	$book_edition = $_POST['book_edition'];
    $book_author_id = $_POST['author_id'];
	$book_publisher_id = $_POST['publisher_id'];
	$book_category_id = $_POST['category_id'];
	$book_publication_year = $_POST['publication_year'];
	$book_ISBN = $_POST['book_isbn'];
	$book_url = $_POST['book_url'];
	$book_cover_link = $_POST['book_cover_image'];
	$date_read = $_POST['date_read'];
	$book_notes = $_POST['book_notes'];

    $book_query = "INSERT INTO books(book_title, book_subtitle,book_edition,author_id,publisher_id,category_id,publication_year,book_isbn,book_url,book_cover_image,date_read,book_notes) ";

    $book_query .= "VALUES('{$book_title}','{$book_subtitle}','{$book_edition}','{$book_author_id}','{$book_publisher_id}','{$book_category_id},','{$book_publication_year}','{$book_isbn}','{$book_url}','{$book_cover_link}','{$date_read}', '{$book_notes}') ";

    $create_book_query = mysqli_query($db, $book_query);
	
	book_confirm_query($create_book_query);
	
    $the_book_id = mysqli_insert_id($db);
	
	echo "<p class='bg-success'>book added.</p>";
	redirect_to("/booknotes/admin");
}

function find_all_books() {
    global $db;

    $books_query = "SELECT * FROM books ORDER BY date_added";
    $select_all_books = mysqli_query($db, $books_query);

    while ($row = mysqli_fetch_assoc($select_all_books)) {
        $book_id = $row['book_id'];
        $book_title = $row['book_title'];
		$book_url = $row['book_url'];
        $book_cover_image = $row['book_cover_image'];
		$book_notes = substr($row['book_notes'], 0, 200);
        $date_read = $row['date_read'];
        ?>
        <?php echo "<div class='col-lg-2 pull-left' id='image_div'><a href='/booknotes/book-details.php?view={$book_id}'><img src='$book_cover_image' class='img-thumbnail img-responsive' /></a></div>
		<div class='col-lg-10 pull-right' id='notes'>
  <h2><a href='/booknotes/book-details.php?view={$book_id}'>$book_title</a></h2>
  <h5>DATE READ: $date_read</h5>
      <p>$book_notes ...</p>
		
		<a href='/booknotes/book-details.php?view={$book_id}' class='btn btn-info'>More Notes...</a>
	  
  </div>";
        
}} 
	
function find_book_by_id() {
    global $db;
	
	if (isset($_GET['view'])) {
        $book_id = $_GET['view'];
    } 

    $book_query = "SELECT * FROM books WHERE book_id = {$book_id}";
    $select_a_book = mysqli_query($db, $book_query);

    while ($row = mysqli_fetch_assoc($select_a_book)) {
        $book_id = $row['book_id'];
        $book_title = $row['book_title'];
		$book_url = $row['book_url'];
        $book_cover_image = $row['book_cover_image'];
		$book_notes = $row['book_notes'];
        $date_read = $row['date_read'];
        ?>
        <?php echo "<div class='col-lg-4 pull-left' id='image_div'><img src='$book_cover_image' class='img-thumbnail img-responsive' alt='$book_title' /></div>
		<div class='col-lg-8 pull-right' id='notes'>
  <h1>$book_title</h1>
  <h3>DATE READ: $date_read</h3>
      <p>$book_notes</p>
		<p>Link to $book_title at the <a href='$book_url' target='_blank'>Open Library</a></p>
		
	  
  </div>";
        
}} 


function update_book() {
    global $db;
    if (isset($_GET['p_id'])) {
        $book_id = $_GET['p_id'];
    } 
    if (isset($_POST['update_book'])) {
        $book_title = $_POST['book_title'];
	$book_subtitle = $_POST['book_subtitle'];
	$book_edition = $_POST['book_edition'];
    $book_author_id = $_POST['author_id'];
	$book_publisher_id = $_POST['publisher_id'];
	$book_category_id = $_POST['category_id'];
	$book_publication_year = $_POST['publication_year'];
	$book_ISBN = $_POST['book_isbn'];
	$book_url = $_POST['book_url'];
	$book_cover_link = $_POST['book_cover_image'];
	$date_read = $_POST['date_read'];
	$book_notes = $_POST['book_notes'];

        $query = "UPDATE books SET ";
        
        $query .= "book_title  = '{$book_title}', ";
		$query .= "book_subtitle = '{$book_subtitle}', ";
		$query .= "book_edition = '{$book_edition}', ";
		
        $query .= "author_id = '{$book_author_id}', ";
		$query .= "publisher_id = '{$book_publisher_id}', ";
		$query .= "category_id = '{$book_category_id}', ";

        $query .= "publication_year = '{$book_publication_year}', ";
        $query .= "book_isbn  = '{$book_ISBN}', ";
		$query .= "book_url  = '{$book_url}', ";
        $query .= "book_cover_image= '{$book_cover_link}', ";
        $query .= "date_read   = '{$date_read}', ";
        $query .= "book_notes = '{$book_notes}' ";

        $query .= "WHERE book_id = {$book_id} ";

        $update_book_query = mysqli_query($db, $query);
		book_confirm_query($update_book_query);

        
		echo "<p class='bg-success'>Book Updated.</p>";
		redirect_to("/booknotes/admin/books");
    }
}

function get_most_recent_books(){
	global $db;
	if(isset($_POST['most-recent'])){
		$query = "SELECT * FROM books ORDER BY date_read DESC";
		$get_most_recent = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_most_recent)) {
        $book_id = $row['book_id'];
        $book_title = $row['book_title'];
		$book_url = $row['book_url'];
        $book_cover_image = $row['book_cover_image'];
		$book_notes = $row['book_notes'];
        $date_read = $row['date_read'];
        ?>
        <?php echo "<div class='col-lg-4 pull-left' id='image_div'><img src='$book_cover_image' class='img-thumbnail img-responsive' /></div>
		<div class='col-lg-8 pull-right' id='notes'>
  <h1>$book_title</h1>
  <h5>DATE READ: $date_read</h5>
      <p>$book_notes</p>
		
		
	  
  </div>";
        
}} 
}

function get_book_titles(){
	global $db;
	if(isset($_POST['book-titles'])){
		$query = "SELECT * FROM books ORDER BY book_title";
		$get_titles = mysqli_query($db, $query);
		
		while ($row = mysqli_fetch_assoc($get_titles)) {
        $book_id = $row['book_id'];
        $book_title = $row['book_title'];
		$book_url = $row['book_url'];
        $book_cover_image = $row['book_cover_image'];
		$book_notes = $row['book_notes'];
        $date_read = $row['date_read'];
        ?>
        <?php echo "<div class='col-lg-4 pull-left' id='image_div'><img src='$book_cover_image' class='img-thumbnail img-responsive' /></div>
		<div class='col-lg-8 pull-right' id='notes'>
  <h1>$book_title</h1>
  <h5>DATE READ: $date_read</h5>
      <p>$book_notes</p>
		
		
	  
  </div>";
        
}} 
}

//==== End books CRUD ====//


//==== Publishers CRUD ====//
function insert_publisher() {
    global $db;

    if (isset($_POST['submit'])) {
        $publisher_name = $_POST['publisher_name'];

        if ($publisher_name == "" || empty($publisher_name)) {
            echo "This field cannot be empty";
        } else {

            $book_query = "INSERT INTO publishers(publisher_name) ";
            $book_query .= "VALUES('{$publisher_name}')";

            $create_publisher_query = mysqli_query($db, $book_query);

            if (!$create_publisher_query) {
                die("QUERY FAILED" . mysqli_error());
            }
        }
    }
}

function find_all_publishers() {
    global $db;
    $query = "SELECT * FROM publishers";
    $select_all_publishers = mysqli_query($db, $query);
book_confirm_query($select_all_publishers);

while ($row = mysqli_fetch_assoc($select_all_publishers)) {
        $publisher_id = $row['publisher_id'];
        $publisher_name = $row['publisher_name'];

        echo "<tr>";
        echo "<td>{$publisher_id}</td>";
        echo "<td>{$publisher_name}</td>";
        echo "<td><a href='/booknotes/admin/publishers/index.php?edit={$publisher_id}'>EDIT</a>
                                </td>";
        echo "<td><a href='/booknotes/admin/publishers/index.php?delete={$publisher_id}'>DELETE</a>
                                </td>";

        echo "</tr>";
    }
    
	
}

function update_publisher() {
    global $db;

    if (isset($_GET['edit'])) {
        $category_id = $_GET['edit'];

        include 'update_publisher.php';
    }
}

function delete_publisher() {
    global $db;

    if (isset($_GET['delete'])) {
        // can rename the variable
        $publisher_id = $_GET['delete'];

        $book_query = "DELETE FROM publishers WHERE publisher_id = {$publisher_id}";

        $delete_query = mysqli_query($db, $book_query);

        redirect_to("/booknotes/admin/publishers");
    }
}

//==== End Publishers CRUD ====//

//==== Authors CRUD ====//
function insert_author() {
    global $db;

    if (isset($_POST['submit'])) {
        $author_name = $_POST['author_name'];

        if ($author_name == "" || empty($author_name)) {
            echo "This field cannot be empty";
        } else {

            $book_query = "INSERT INTO authors(author_name) ";
            $book_query .= "VALUES('{$author_name}')";

            $create_author_query = mysqli_query($db, $book_query);

            if (!$create_author_query) {
                die("QUERY FAILED" . mysqli_error());
            }
        }
    }
}

function find_all_authors() {
    global $db;
    $query = "SELECT * FROM authors";
    $select_all_authors = mysqli_query($db, $query);
book_confirm_query($select_all_authors);

while ($row = mysqli_fetch_assoc($select_all_authors)) {
        $author_id = $row['author_id'];
        $author_name = $row['author_name'];

        echo "<tr>";
        echo "<td>{$author_id}</td>";
        echo "<td>{$author_name}</td>";
        echo "<td><a href='/booknotes/admin/authors/index.php?edit={$author_id}'>EDIT</a>
                                </td>";
        echo "<td><a href='/booknotes/admin/authors/index.php?delete={$author_id}'>DELETE</a>
                                </td>";

        echo "</tr>";
    }
    
	
}

function update_author() {
    global $db;

    if (isset($_GET['edit'])) {
        $author_id = $_GET['edit'];

        include 'update_author.php';
    }
}

function delete_author() {
    global $db;

    if (isset($_GET['delete'])) {
        // can rename the variable
        $author_id = $_GET['delete'];

        $book_query = "DELETE FROM authors WHERE author_id = {$author_id}";

        $delete_query = mysqli_query($db, $book_query);

        redirect_to("/booknotes/admin/authors");
    }
}

//==== End Categories CRUD ====//


// Dashboard index page - OPTION TWO
function count_all_records($table) {
    global $db_connection;
    $query = "SELECT * FROM " . $table;
    $select_books = mysqli_query(db_connect(), $query);
    return mysqli_num_rows($select_books);
}

function check_status($table, $column_name, $value) {
    global $db_connection;
    $query = "SELECT * FROM $table WHERE $column_name = '$value'";
    $result = mysqli_query(db_connect(), $query);
    return mysqli_num_rows($result);
}
