<form action="" method="post">
						<div class="form-group">
						<label for="author_name">Edit Author Name</label>
						
						<?php 
						
						if(isset($_GET['edit'])){
							// can rename the author_id variable if needed
							$author_id = $_GET['edit'];
							
							$query = "SELECT * FROM authors WHERE author_id = {$author_id}";
							$select_author_id = mysqli_query($db, $query); 
							
							while($row = mysqli_fetch_assoc($select_author_id)){
								$author_id = $row['author_id'];
								$author_name = $row['author_name'];
								?>
								
							<input value="<?php if(isset($author_name)) {echo $author_name;} ?>" class="form-control" type="text" name="author_name">
							
							<?php }	} ?>
						
						<?php
						
						if(isset($_POST['update_author'])){
						// can rename the author_id variable
						$author_name = $_POST['author_name'];
						
						$query = "UPDATE authors SET author_name = '$author_name' WHERE author_id = {$author_id}";
						
						$update_query = mysqli_query($db, $query);
						
						if(!$update_query){
										die("QUERY FAILED".mysqli_error());
									}
						
						//header("Location: /booknotes/admin/categories/index.php"); FIX THIS
						redirect('/booknotes/admin/authors'); 
					}
						
						?>
						</div>
						<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update_author" value="Update Author">
						</div>
						
						</form>