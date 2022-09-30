<?php

session_start();

include('../config/dbcon.php');

include('myfunctions.php');


//Verification for the registration
if(isset($_POST['register_btn']))
{
	$name      = mysqli_real_escape_string($con,$_POST['name']);
	$email     = mysqli_real_escape_string($con,$_POST['email']);
	$phone     = mysqli_real_escape_string($con,$_POST['phone']);
	$password  = mysqli_real_escape_string($con,$_POST['password']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

	//Checkif email is already registered
	$check_email_query = "SELECT email FROM users WHERE email='$email' ";
	$check_email_query_run = mysqli_query($con,$check_email_query);

	if(mysqli_num_rows($check_email_query_run) > 0)
	{
		$_SESSION['message'] = "Email already registred";
		header('location: ../register.php');
	}
	else
	{

		if($password == $cpassword)
		{
			//Insert data to database
			$insert_query = "INSERT INTO users (name,email,phone,password) 	VALUES ('$name','$email','$phone','$password')";
			$insert_query_run = mysqli_query($con,$insert_query);

			 if($insert_query_run)
			 {
			 	$_SESSION['message'] = "Registered succesfully";
			 	header('location: ../login.php');
			 }
			 else
			 {
			 	$_SESSION['message'] = "Something went wrong";
			 	header('location: ../register.php');
			 }
		}
		else
		{
			$_SESSION['message'] = "Password do not match";
			header('location: ../register.php');
		}
	}

}

//Verification to allow user to log in
else if(isset($_POST['login_btn']))
{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	$login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
	$login_query_run = mysqli_query($con,$login_query);

	if(mysqli_num_rows($login_query_run) > 0)
	{
		$_SESSION['auth'] = true;

		$userdata = mysqli_fetch_array($login_query_run);
		$userid = $userdata['id'];
		$username = $userdata['name'];
		$useremail = $userdata['email'];
		$role_as = $userdata['role_as'];

		$_SESSION['auth_user'] = [
			'user_id' => $userid,
			'name' => $username,
			'email' => $useremail
		];

		$_SESSION['role_as'] = $role_as;
		if($role_as == 1)
		{
			redirect("../admin/index.php", "Welcome to Dashboard");
		}
		else
			{
				redirect("../index.php", "Logged in succesfully");
		    }
		}	
	else
	{
		redirect("../login.php", "Invalid credentials");
	}
}

?>