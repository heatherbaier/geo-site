<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<link href="css/styles copy.css" rel="stylesheet">
	<title>Global Education Observatory</title>
	<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

	<!-- <link href= type="text/javascript"> -->
	<!-- <script src="js/logout.js"></script> -->

	
</head>


<body>
	<div id="header-cont">
		<div class="dropdown" style="float: right;">
			
				<!-- <div> -->
			<button class="dropbtn"><span class="material-symbols-outlined">menu</span></button>
				<!-- </div> -->
			
			<div class="dropdown-content">
				<a href="index.php">Home</a>
				<a href="#">About</a>
				<a href="#">School Map</a>

				<?php 
					session_start();
					$uid = $_SESSION['user_id'];
					if (isset($uid)) {
						print_r("<a href='home.php'>Dashboard</a>");
					}
					is_null($uid) ? print_r("<a href='login.php'>Login</a>") : print_r("<a href='logout.php'>Logout</a>");
				?>

			</div>
		</div>

	</div>

	<div id="main">