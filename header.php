<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<link href="css/homeswitchcolor.css" rel="stylesheet">
	<title>Global Education Observatory</title>
	<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />

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
	<div class="header-cont">
		<img class = 'headerimg' src = "assets/geoLogocolor (3).png">

		<div class = "title">
			<h1 id = 'titleGEO' > <a class = 'titlelinks' href="home.php">Global Educational Observatory</a> by the <a class = 'titlelinks' href="https://geolab.wm.edu/">William & Mary geoLab</a></h1>
		</div>

		<div class="hamburger-menu">
			<input id="menu__toggle" type="checkbox" />
			<label class="menu__btn" for="menu__toggle">
				<span></span>
			</label>

			<ul class="menu__box">
				<li><a class="menu__item" href="home.php">Home</a></li>
				<li><a class="menu__item" href="school_explorer.php">School Explorer</a></li>
				<li><a class="menu__item" href="sdg_explorer.php">Sustainable Development Goals Explorer</a></li>
				<li><a class="menu__item" href="topic_explorer.php">Blogs and Topic Explorer</a><li>
				<li><a class="menu__item" href="school_map.php">School Map</a></li>
				<li><a class="menu__item" href="statements.php">Statements of Context, Ethics, and Accountability</a><li>
				<li><a class="menu__item" href="export_download.php">Blogs and Posts</a></li>
				<li><a class="menu__item" href="about_us.php">About Us</a></li>
			</ul>
		</div>

		<!--<div class="dropdown">
			<button class="dropbtn"><span class="material-symbols-outlined"> density_small </span></button>
			<div class="dropdown-content">
				<a href="home.php">Home</a>
				<a href="school_explorer.php">School Explorer</a>
				<a href="sdg_explorer.php">SDG Explorer</a>
				<a href="topic_explorer.php">Topic Explorer</a>
				<a href="school_map.php">School Map</a>
				<a href="export_download.php">Export and Download</a>
				<a href="statements.php">Statements of E,C,A</a>
				<a href="about_us.php">About Us</a>
			</div>
		</div>-->
</div>

