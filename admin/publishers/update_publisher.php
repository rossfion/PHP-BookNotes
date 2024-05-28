<form action="" method="post">
						<div class="form-group">
						<label for="publisher_name">Edit Publisher Name</label>
						
						<?php 
						
						if(isset($_GET['edit'])){
							// can rename tthe publisher_id variable if needed
							$publisher_id = $_GET['edit'];
							
							$query = "SELECT * FROM publishers WHERE publisher_id = {$publisher_id}";
							$select_publisher_id = mysqli_query($db, $query); 
							
							while($row = mysqli_fetch_assoc($select_publisher_id)){
								$publisher_id = $row['publisher_id'];
								$publisher_name = $row['publisher_name'];
								?>
								
							<input value="<?php if(isset($publisher_name)) {echo $publisher_name;} ?>" class="form-control" type="text" name="publisher_name">
							
							<?php }	} ?>
						
						<?php
						
						if(isset($_POST['update_publisher'])){
						// can rename the publisher_id variable
						$publisher_name = $_POST['publisher_name'];
						
						$query = "UPDATE publishers SET publisher_name = '$publisher_name' WHERE publisher_id = {$publisher_id}";
						
						$update_query = mysqli_query($db, $query);
						
						if(!$update_query){
										die("QUERY FAILED".mysqli_error());
									}
						
						//header("Location: /booknotes/admin/categories/index.php"); FIX THIS
						redirect('/booknotes/admin/publishers'); 
					}
						
						?>
						</div>
						<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update_publisher" value="Update Publisher">
						</div>
						
						</form>