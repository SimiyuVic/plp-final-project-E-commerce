<?php

 session_start();

 include('includes/header.php');

?>
  <div class="py-5">
  	<div class="container">
  		<div class="row">
  			<?php
         if(isset($_SESSION['message']))
        { 
         ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey !</strong> <?= $_SESSION['message']; ?>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
       <?php
            unset($_SESSION['message']);
         }  
     ?>
  		</div>
  	</div>
  </div>
    
  <?php


    if(isset($_GET['category']))
        {

            $category_slug = $_GET['category'];
            $category_data = getSlugActive("categories",$category_slug);
            $category = mysqli_fetch_array($category_data);

            if($category)
            {
                $category_id = $category['id'];

                 ?>

                   <div class="py-3 bg-primary">
                       <div class="container">
                           <h6 class="text-white">
                               <a class="text-white" href="categories.php">
                                   Home /
                               </a>
                               <a class="text-white" href="categories.php">
                                   Collections /
                               </a>
                            
                             <?= $category['name']; ?></h6>
                       </div>
                   </div>
                   <div class="py-3">
                       <div class="container">
                           <div class="row">
                               <div class="col-md-12">
                                   <h2><?= $category['name']; ?></h2>
                                   <hr>
                                   <div class="row">

                                       <?php
                                           $products = getProdByCategory($category_id);

                                           if(mysqli_num_rows($products) > 0)
                                           {
                                               foreach($products as $item)
                                               {
                                                   ?>
                                                   <div class="col-md-3 mb-2">
                                                      <a href="view-product.php?product=<?= $item['slug']; ?>">
                                                         <div class="card shadow">
                                                           <div class="card-body">
                                                               <img src="uploads/<?= $item['image'];?>" alt="Product Image" class="w-100 height-50px"  >
                                                               <h4 class="text-center"><?= $item['name'];?></h4>
                                                           </div>
                                                         </div>
                                                      </a>
                                                   </div>
                                                       
                                                   <?php
                                               }
                                           }
                                           else
                                           {
                                               echo "No data available ";
                                           }
                                       ?>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

               <?php
            }
            else
             {
               echo "Something went wrong";
             }

            }
             else
             {
               echo "Something went wrong";
             }

 

   ?>

    </div>

<?php include('includes/footer.php'); ?>