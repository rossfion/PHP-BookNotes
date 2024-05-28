<form action="" method="post">
						<div class="form-group">
						<label for="category_name">Edit Category Name</label>
						
						<?php 
						
						if(isset($_GET['edit'])){
							// can rename tthe category_id variable if needed
							$category_id = $_GET['edit'];
							
							$query = "SELECT * FROM categories WHERE category_id = {$category_id}";
							$select_category_id = mysqli_query($db, $query); 
							
							while($row = mysqli_fetch_assoc($select_category_id)){
								$category_id = $row['category_id'];
								$category_name = $row['category_name'];
								?>
								
							<input value="<?php if(isset($category_name)) {echo $category_name;} ?>" class="form-control" type="text" name="category_name">
							
							<?php }	} ?>
						
						<?php
						
						if(isset($_POST['update_category'])){
						// can rename the category_id variable
						$category_name = $_POST['category_name'];
						
						$query = "UPDATE categories SET category_name = '$category_name' WHERE category_id = {$category_id}";
						
						$update_query = mysqli_query($db, $query);
						
						if(!$update_query){
										die("QUERY FAILED".mysqli_error());
									}
						
						header("Location: categories.php");
						//redirect('/booknotes/admin/categories'); FIX THIS
					}
						
						?>
						</div>
						<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
						</div>
						
						</form>