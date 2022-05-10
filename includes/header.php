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

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

	<!-- choose a theme file -->
	<!-- load jQuery and tablesorter scripts -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>

	<!-- tablesorter widgets (optional) -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/extras/jquery.tablesorter.pager.min.js"></script>


	






</head>


<body>
	<div id="header-cont">
		<div class="dropdown" style="float: right;">
			<button class="dropbtn"><span class="material-symbols-outlined">menu</span></button>
			<div class="dropdown-content">
				<a href="index.php">Home</a>
				<a href="#">About</a>
				<a href="school_map.php">School Map</a>

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