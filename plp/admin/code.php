<?php



include('../config/dbcon.php');

include('../functions/myfunctions.php');

if(isset($_POST['add_category_btn']))
{
	$name             = $_POST['name'];
	$slug             = $_POST['slug'];
	$description      = $_POST['description'];
	$meta_title       = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	$meta_keyword     = $_POST['meta_keyword'];
	$status           = isset($_POST['status']) ? '1':'0' ;
	$popular          = isset($_POST['popular']) ? '1':'0' ;

	$image = $_FILES['image']['name'];

	$path = "../uploads";

	$image_ext = pathinfo($image, PATHINFO_EXTENSION);
	$filename = $image;

	$cate_query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keyword,status,popular,image)
	VALUES('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$status','$popular','$image')";

	$cate_query_run = mysqli_query($con, $cate_query);

	if($cate_query_run)
	{
		move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

		redirect("add-category.php", "Category Added Succesfully");
	}
	else
	{
		redirect("add-category.php", "Something Went Wrong");
	}
}

else if(isset($_POST['update_category_btn']))
{
	$category_id      = $_POST['category_id'];
	$name             = $_POST['name'];
	$slug             = $_POST['slug'];
	$description      = $_POST['description'];
	$meta_title       = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	$meta_keyword     = $_POST['meta_keyword'];
	$status           = isset($_POST['status']) ? '1':'0' ;
	$popular          = isset($_POST['popular']) ? '1':'0' ;

	$new_image = $_FILES['image']['name'];
	$old_image = $_POST['old_image'];

	if($new_image != "")
	{
		$update_filename = $new_image;
	}
	else
	{
		$update_filename = $old_image;
	}

	$path = "../uploads";

	$update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword', status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id'  ";


	$update_query_run = mysqli_query($con, $update_query);

	if($update_query_run)
	{
		if($_FILES['image']['name'] != "")
		{
			move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);

			if(file_exists("../uploads/".$old_image))
			{
				unlink("../uploads/".$old_image);
			}
		}
		redirect("edit-category.php?id=$category_id", "Category updated succesfully");	
	}
	else
	{
		redirect("edit-category.php?id=$category_id", "Something went wrong");
	}
}

else if(isset($_POST['delete_category_btn']))
{
	$category_id = mysqli_real_escape_string($con, $_POST['category_id']);

	$category_query = "SELECT * FROM  products WHERE id='$product_id' ";
	$category_query_run = mysqli_query($con, $category_query);
	$category_data = mysqli_fetch_array($category_query_run);
	$image = $category_data['image'];

	$delete_query = "DELETE FROM categories WHERE id='$category_id' ";
	$delete_query_run = mysqli_query($con, $delete_query);

	if($delete_query_run)
	{
		
		if(file_exists("../uploads".$image))
		{
			unlink("../uploads".$image);
		}

		  //redirect("category.php", "Category deleted succesfully");
		echo 200;
	}
	else
	{
		//redirect("product.php?id=", "Something went wrong");
		echo 500;
	}
}

else if(isset($_POST['add_product_btn']))
{
	$category_id = $_POST['category_id'];

	$name              = $_POST['name'];
	$slug              = $_POST['slug'];
	$small_description = $_POST['small_description'];
	$description       = $_POST['description'];
	$original_price    = $_POST['original_price'];
	$selling_price     = $_POST['selling_price'];
	$qty               = $_POST['qty'];
	$meta_title        = $_POST['meta_title'];
	$meta_keywords     = $_POST['meta_keywords'];
	$meta_description  = $_POST['meta_description'];
	$status            = isset($_POST['status']) ? '1':'0' ;
	$trending          = isset($_POST['trending']) ? '1':'0' ;

	$image = $_FILES['image']['name'];

	$path = "../uploads";

	$image_ext = pathinfo($image, PATHINFO_EXTENSION);
	$filename = $image;

	if($name != "" && $slug != "" && $description != "")
	{
	
		$product_query = "INSERT INTO products(category_id,name,slug,small_description,description,original_price,selling_price,qty,meta_title,meta_keywords,meta_description,status,trending,image) VALUES('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','meta_title','$meta_keywords','$meta_description','$status','$trending','$image') ";

		$product_query_run = mysqli_query($con,$product_query);

		if($product_query_run)
		{
			move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

			redirect("add-product.php", "Product Added Succesfully");
		}
		else
		{
			redirect("add-product.php", "Something went wrong");
		}
	}
	else
		{
			redirect("add-product.php", "All fields are mandatory");
		}
}

else if(isset($_POST['update_product_btn']))
{
	$product_id  = $_POST['product_id'];
	$category_id = $_POST['category_id'];

	$name              = $_POST['name'];
	$slug              = $_POST['slug'];
	$small_description = $_POST['small_description'];
	$description       = $_POST['description'];
	$original_price    = $_POST['original_price'];
	$selling_price     = $_POST['selling_price'];
	$qty               = $_POST['qty'];
	$meta_title        = $_POST['meta_title'];
	$meta_keywords     = $_POST['meta_keywords'];
	$meta_description  = $_POST['meta_description'];
	$status            = isset($_POST['status']) ? '1':'0' ;
	$trending          = isset($_POST['trending']) ? '1':'0' ;

	$image = $_FILES['image']['name'];

	$path = "../uploads";

	
	$new_image = $_FILES['image']['name'];
	$old_image = $_POST['old_image'];

	if($new_image != "")
	{
		$image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
		$update_filename = $new_image;
	}
	else
	{
		$update_filename = $old_image;
	}

	$update_product_query = "UPDATE products SET name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',meta_title='meta_title',meta_keywords='$meta_keywords',meta_description='$meta_description',status='$status',trending='$trending',image='$update_filename' WHERE id='$product_id' ";
	$update_product_query_run = mysqli_query($con, $update_product_query);

	if($update_product_query_run)
	{
		if($_FILES['image']['name'] != "")
		{
			move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);

			if(file_exists("../uploads/".$old_image))
			{
				unlink("../uploads/".$old_image);
			}
		}
		redirect("edit-product.php?id=$product_id", "Product updated succesfully");	
	}
	else
	{
		redirect("edit-product.php?id=$product_id", "Something went wrong");
	}

}
else if(isset($_POST['delete_product_btn']))
{
	$product_id = mysqli_real_escape_string($con, $_POST['product_id']);

	$product_query = "SELECT * FROM  products WHERE id='$product_id' ";
	$product_query_run = mysqli_query($con,$product_query);
	$product_data = mysqli_fetch_array($product_query_run);
	$image = $product_data['image'];

	$delete_query = "DELETE FROM products WHERE id='$product_id' ";
	$delete_query_run = mysqli_query($con, $delete_query);

	if($delete_query_run)
	{
		
		if(file_exists("../uploads".$image))
		{
			unlink("../uploads".$image);
		}

		  //redirect("product.php", "Product deleted succesfully");
		echo 200;
	}
	else
	{
		//redirect("product.php?id=", "Something went wrong");
		echo 500;
	}
}
else
{
	header('location: ../index.php');
}

?>