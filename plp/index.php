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
  <section class=" bg-dark text-light p-5 p-lg-0 text-center text-sm-start welcome">
        <div class="container">
            <div class=" align-items-center justify-content-between text-center">

                <h1> Shopper</h1>
                
            </div>
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search here" required>
                <button type="submit" class="searchButton">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"></path></svg>
                </button>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between">

                <div class="text-center box">
                    <i class="bi bi-clipboard fs-4"></i>
                    <h3 class="text-center"><a href="">TSHIRTS</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, non?</p>
                </div>


                <div class="text-center box">
                    <i class="bi bi-file-earmark-arrow-down fs-4"></i>
                    <h3 class="text-center"><a href="">Shoes</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi.
                    </p>
                </div>


                <div class="text-center box">
                    <i class="bi bi-badge-hd fs-4"></i>
                    <h3 class="text-center"><a href="">Bags</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, rem.</p>
                </div>

            </div>

            <div class="d-grid col-4 mx-auto">
                <button class="wrap-b">
                    <a href="pages/signup.html"> Get Started</a>

                </button>
            </div>

        </div>


    </section>
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