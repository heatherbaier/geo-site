<?php include 'includes/school_explorer_header.php' ?>

<style>

#map{
	align-content: center;
}
body{

background-color: #eee; 
width: 100%;
height: 100%;
}
.container{
	display: flex;
	flex-direction: column;
	align-content: center;
}
table th{
	text-align: center;
	font-size: 20px;
}

table td{
text-align: center;
font-size: 20px;

}

table tr{

}
tbody{

}


.pagination li:hover{
cursor: pointer;
}
    table tbody tr {
    }

#tableContents{
	text-align: center;
	align-content: center;

}
td:first-child { display:none; }
th:first-child { display:none; }

#horizontalMapFacts{
	display: flex;
	flex-direction: row;
}

#fastFacts{
	padding-left: 5%;
}
#ffTitle{
	color: #4a7584;
}


.customPopup .leaflet-popup-content-wrapper,
.customPopup .leaflet-popup-tip {
	color: #f1f3f4;
	background: #4a7584;
	font-size: 20px;
}

</style>

<body>
<div class="container">
<div id = "tableContents">

<?php

session_start();
include('config.php');

if ( ! empty( $_GET['idSaved'] ) ) { 
	$idSavedFrom = $_GET['idSaved'];
	
}  


$resultCoords = mysqli_query($con, "SELECT * FROM `coordinates` WHERE geo_id LIKE '$idSavedFrom'");
$resultInfo = mysqli_query($con, "SELECT * FROM `ids` WHERE geo_id LIKE '$idSavedFrom' LIMIT 1");

echo "<table class='table table-striped table-class' id='coord-table-id' style='overflow: visible'>
<thead>
	<tr>
		<th>School Name</th>
		<th>Territory</th>
		<th>Municipality</th>
		<th>Country Code</th>
	</tr>
</thead>

<tbody>";

$schoollong;
$schoollat;

while( $row2 = mysqli_fetch_array($resultCoords)){ 

	$schoollong = $row2['longitude'];
	$schoollat = $row2['latitude'];
}

while( $row = mysqli_fetch_array($resultInfo)){
//$uname = $row['username'];
echo "<tr>
<td>" . $row['school_name'] . "</td>
<td id = 'territory'>" . $row['adm1'] . "</td>
<td>" . $row['adm2'] . "</td>
<td>" . $row['adm0'] . "</td>
</tr>";

$schoolname = $row['school_name'];
$municipal = $row['adm2'];
$territory = $row['adm1'];
}

echo "</tbody></table>";


$resultMunicipal = mysqli_query($con, "SELECT COUNT(adm2) AS 'rM' FROM `ids` WHERE adm2 LIKE '$municipal'");
$resultTerritory = mysqli_query($con, "SELECT COUNT(adm1) AS 'rT' FROM `ids` WHERE adm1 LIKE '$territory'");

while($row4 = mysqli_fetch_array($resultTerritory)){
	$territorytotal = $row4['rT'];
}
while($row3 = mysqli_fetch_array($resultMunicipal)){
	$municipaltotal = $row3['rM'];
}
?>

</div>

<div id= "horizontalMapFacts">
	<div id="map" style="width: 600px; height: 500px;"></div>

	<div id = "fastFacts">
		<h3 id = "ffTitle" > Fast Facts: </h3>
		<h4> Number of Schools in <?php echo $territory; ?>: <?php echo $territorytotal; ?> </h4>
		<h4> Number of Schools in <?php echo $municipal; ?>: <?php echo $municipaltotal; ?></h4>
		<h4> OTHER FACTS HERE</h4>
	</div>

</div>

</div>
</body>



<script src="js/pagination.js"></script>

<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>

<script>

	var long = "<?php echo"$schoollong"?>";
	var lat = "<?php echo"$schoollat"?>";
	var name = "<?php echo"$schoolname"?>";
	var map = L.map('map').setView([lat, long], 12);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
	}).addTo(map);

	const customOptions = {
 		'className': 'customPopup' // name custom popup
	}


	var marker = L.marker([lat, long]).addTo(map);
	marker.bindPopup(name, customOptions);
	marker.openPopup();
</script>

