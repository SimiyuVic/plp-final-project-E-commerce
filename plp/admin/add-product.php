<?php

 
include('../middleware/adminMiddleware.php');
include('includes/header.php'); 


 ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Add Product
					</div>
					<div class="card-body">
						<form action="code.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<label class="mb-0">Select Category</label>
						        <select name="category_id" class="form-select mb-2">
						        	<option selected>Select Category</option>
						        	<?php
						        	  $categories = getAll("categories");

						        	  if(mysqli_num_rows($categories) > 0)
						        	  {
						        	  	foreach($categories as $item)
							        	{
							        		?>
							        		<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
							        		<?php
							        	}
						        	  }
						        	  else
						        	  {
						        	  	echo "No category available";
						        	  }
							        	
							        	?>
								  
								</select>
							</div>
							<div class="col-md-6">
								<label class="mb-0">Name</label>
						        <input type="text" required name="name"  placeholder="Enter Category name" class="form-control mb-2" name="">
							</div>
							<div class="col-md-6">
								<label class="mb-0">Slug</label>
						        <input type="text" required name="slug" placeholder="Enter Slug" class="form-control mb-2" name="">
							</div>
							<div class="col-md-12">
								<label class="mb-0">Small Description</label>
						        <textarea rows="3" name="small_description" required placeholder="Enter small description" class="form-control mb-2"></textarea>
							</div>
							<div class="col-md-12">
								<label class="mb-0">Description</label>
						        <textarea rows="3" required name="description" placeholder="Enter description" class="form-control mb-2"></textarea>
							</div>
							<div class="col-md-6">
								<label class="mb-0">Original Price</label>
						        <input type="text" required name="original_price"  placeholder="Enter Original Price" class="form-control mb-2" name="">
							</div>
							<div class="col-md-6">
								<label class="mb-0">Selling Price</label>
						        <input type="text" required name="selling_price" placeholder="Enter Selling Price" class="form-control mb-2" name="">
							</div>
							<div class="col-md-12">
								<label class="mb-0">Upload Image</label>
						        <input type="file" required name="image" class="form-control mb-2">
							</div>
							<div class="row">
								<div class="col-md-6">
									<label class="mb-0">Quantity</label>
							        <input type="number" required name="qty" placeholder="Enter Quantity" class="form-control mb-2" name="">
							    </div>
								<div class="col-md-3">
								   <label class="mb-0">Status</label><br>
						           <input type="checkbox"  name="status">
							    </div>
							    <div class="col-md-3">
								  <label class="mb-0">Trending</label><br>
						          <input type="checkbox"  name="trending">
							   </div>
							</div>
							<div class="col-md-12">
								<label class="mb-0">Meta Title</label>
						        <input type="text" required name="meta_title" placeholder="Enter meta title" class="form-control mb-2" name="">
							</div>
							<div class="col-md-12">
								<label class="mb-0">Meta Description</label>
						        <textarea rows="3" required name="meta_description" placeholder="Enter meta description" class="form-control mb-2"></textarea>
							</div>
							<div class="col-md-12">
								<label class="mb-0">Meta Keywords</label>
						        <textarea rows="3" required name="meta_keyword" placeholder="Enter meta Keyword" class="form-control mb-2"></textarea>
							</div>
							
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include('includes/footer.php'); ?>