<?php 

$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'ecommerce_db';

//create database connection
$con = mysqli_connect($host, $username, $password, $database);

//check database connection
if(!$con)
{
	die("Connection failed: ".mysqli_connect_error());
}

?>