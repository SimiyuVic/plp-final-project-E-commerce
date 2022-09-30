<?php

 session_start();

 if(isset($_SESSION['auth']))
 {
    $_SESSION['message'] = "You are already logged in";
    header('location: index.php');
    exit();
 }

 include('includes/header.php'); 

 ?>

<div class="py-5">
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php if(isset($_SESSION['message']))
				{ 
					?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Hey!</strong> <?= $_SESSION['message']; ?>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				unset($_SESSION['message']);
				 }	
				?>
				<div class="card">
					<div class="card-header">
						<h4>Registration Form</h4>
					</div>
					<div class="card-body">
						<form action="functions/auth.php" method="POST">
							<div class="mb-3">
							   <label class="form-label">Name</label>
							   <input type="text" name="name" placeholder="Enter your name" class="form-control" required>
							</div>
						  <div class="mb-3">
							   <label class="form-label">Email address</label>
							   <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
							</div>
							<div class="mb-3">
							   <label class="form-label">Phone</label>
							   <input type="number" name="phone" placeholder="Enter your Phone-Number" class="form-control" required>
							</div>
							  <div class="mb-3">
							    <label  class="form-label">Password</label>
							    <input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
							  </div>
							  <div class="mb-3">
							    <label class="form-label">Confirm Password</label>
							    <input type="password" name="cpassword" class="form-control" placeholder="Confirm your Password" required>
							  </div>
							  <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php include('includes/footer.php'); ?>