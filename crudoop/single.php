<?php
include_once "./vendor/autoload.php";
use APP\Controller\Student;


$stu = new Student;
$user_id = $_GET['user_id']?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teachers Info</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
	
<div class="card mx-auto my-5 shadow w-25">
     <div class="single-user my-5 mx-auto ">

	 <?php 
	 /**
	  * fetching all data from database
	  */
	 $data =$stu->viewAll($user_id);
	 $user = $data->fetch_object();
	 
	 ?>
	
		 <h2><?php echo $user->name; ?></h2>
		 <h3><?php echo $user->email; ?></h3>
		 <h3><?php echo $user->cell; ?></h3>
	
	
		 <a class ="btn btn-primary" href="./index.php" >Back</a>

	 </div>
	 </div>



	<!-- JS FILES  -->
	<script src ="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	
	<script src="assets/js/scripts.js"></script>
	
</body>
</html>