<?php include 'includes/school_explorer_header.php' ?>

<style>

body{

background-color: #eee; 
width: 100%;
}

table th{
	text-align: center;
	font-size: 20px;
}

table td{
text-align: center;
width: 20%;
font-size: 20px;
}

table tr{

}
tbody{

}
table tr:nth-child(even){
background-color: #C3B59F;

}

.pagination li:hover{
cursor: pointer;
}
    table tbody tr {
        display: none;
    }

.container{
	display: flex;
	flex-direction: row;
	width: 100%;
}

#selectionForm{
	width: 35%;
	padding-left: 3%;
	padding-right: 4%;
	font-size: 17px;

	
}
#territory{

}
#geo_id_table{
	width: 15%;
	align: center;
	height: 100%;
}

#tableContents{
	width: 100%;
	padding-right: 3%;
	text-align: center;
	height: 100%;
}

#downloadButton{
	font-size: 20px;
	padding: 1%;
	margin: 1%;
	border: 2px solid #4a7584;
	border-radius: 5px;
}

#searchButton{
	padding: 2%;
	font-size: 20px;
	width: 250px;
	border: 2px solid #4a7584;
	border-radius: 5px;
}

.pagination-counter{
	width: 250px;
}

.searchBox{
	width: 250px;
	padding: 0%;
}

#selectStatement{
	font-size: 15px;
	margin-top: 50px;
}

.form-group{
	width: 250px;
}

td:first-child {     display:none; }
th:first-child {     display:none; }

.seeMore{
	font-size: 20px;
}
</style>


<div class="container">

<div id = "selectionForm">
<form name = "form" action="" method="post">
	<br></br>
    CountryTEST contains: <p></p> 
	<input name="geo_id_input" class = 'searchBox' value=""/> <br></br>
	Country Code contains:  <p></p> 
	<input name="adm0_input"  class = 'searchBox' value=""/> <br></br>
	Territory contains:  <p></p> 
	<input name="adm1_input"  class = 'searchBox' value=""/> <br></br>
	Municipality contains:  <p></p> 
	<input name="adm2_input"  class = 'searchBox' value=""/> <br></br>
	School Name contains:  <p></p> 
	<input name="school_name_input"  class = 'searchBox' value=""/> <br></br>

	<input type = "submit" id = 'searchButton' value = "Search!"/>

</form>



<h6 id = "selectStatement" >Select Number Of Visible Entries</h2>
		<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			<select class  ="form-control" name="state" id="maxRows">
				<option value="5"></option>
				<option value="100">100</option>
				<option value="200">200</option>
				<option value="300">300</option>
				<option value="400">400</option>
				<option value="500">500</option>
				<option value="1000">1000</option>
			</select>	
		</div>


<div class='pagination-container' >
	<nav>
		<ul class="pagination">
            
            <li data-page="prev" >
			<span> < <span class="sr-only">(current)</span></span>
			</li>
			<!--	Here the JS Function Will Add the Rows -->
        <li data-page="next" id="prev">
		<span> > <span class="sr-only">(current)</span></span>
		</li>
		</ul>
	</nav>
</div>
</div>

<div id = "tableContents">
<?php

session_start();

include('config.php');

	$resultDefault = mysqli_query($con, "SELECT * FROM `ids` LIMIT 100 OFFSET 0");

	$geo_id_value = $_POST['geo_id_input'];
	$school_name_value = $_POST['school_name_input'];
	$adm0_value = $_POST['adm0_input'];
	$adm1_id_value = $_POST['adm1_input'];
	$adm2_id_value = $_POST['adm2_input'];

	// if(isset($_GET['page']))
    // {
    //     $page = $_GET['page'];
    // }
    // else
    // {
    //     $page = 1;
    // }

    // $num_per_page = 1000;
    // $start_from = ($page-1)*1000;
    
    //$result = mysqli_query($con, "SELECT * FROM `ids` WHERE school_name LIKE '%$school_name_value%' AND geo_id LIKE '%$geo_id_value%' AND adm0 LIKE '%$adm0_id_value%' AND adm1 LIKE '%$adm1_id_value%' AND adm2 LIKE '%$adm2_id_value%' LIMIT $start_from";);


	$resultRequest = mysqli_query($con, "SELECT * FROM `ids` WHERE school_name LIKE '%$school_name_value%' AND geo_id LIKE '%$geo_id_value%' AND adm0 LIKE '%$adm0_id_value%' AND adm1 LIKE '%$adm1_id_value%' AND adm2 LIKE '%$adm2_id_value%' LIMIT 10000 ");
	$resultCoords = mysqli_query($con, "SELECT * FROM `coordinates` WHERE geo_id LIKE '%$geo_id_value_two%'");
	echo "<br><br>";

	echo "<table class='table table-striped table-class' id='table-id' style='overflow: visible'>
	<thead>
		<tr>
			<th>GEO ID</th>
			<th>Country Code</th>
			<th>Territory</th>
			<th>Municipality</th>
			<th>School Name</th>
		</tr>
	</thead>
	
	<tbody>";
	
	//while($row = mqsqli_fetch_array($result))
	
	
	while(
		$row = mysqli_fetch_array($resultRequest)
	
	){
	
	
	//$uname = $row['username'];
	echo "<tr>
	<td id = 'geo_id_table'> <button id =" . $row['geo_id'] . " class = 'seeMore' onclick='saveId(this)'>". $row['geo_id'] . "</button></td>
	<td>" . $row['adm0'] . "</td>
	<td id = 'territory'>" . $row['adm1'] . "</td>
	<td>" . $row['adm2'] . "</td>
	<td>" . $row['school_name'] . "</td>
	</tr>";
	}
	
	echo "</tbody></table>";


        
	// $pr_query = "SELECT * FROM `ids` WHERE school_name LIKE '%$school_name_value%' AND geo_id LIKE '%$geo_id_value%' AND adm0 LIKE '%$adm0_id_value%' AND adm1 LIKE '%$adm1_id_value%' AND adm2 LIKE '%$adm2_id_value%'";
	// $pr_result = mysqli_query($con,$pr_query);
	// $total_record = mysqli_num_rows($pr_result);
	
	// $total_page = ceil(40000/$num_per_page);

	// if($page>1)
	// {
	// 	echo "<a href='school_explorer.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
	// }

	
	// for($i=1;$i<$total_page;$i++)
	// {
	// 	echo "<a href='school_explorer.php?page=".$i."' class='btn btn-primary'>$i</a>";
	// }

	// if($i>$page)
	// {
	// 	echo "<a href='school_explorer.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
	// }
    

    

?>

<button id = 'downloadButton' onclick="exportTableToCSV('GEOselecteddata.csv')">Export Selected Entries to CSV File</button>
<div id = 'seeMoreInfoPlace'></div>
<div id="map" style="width: 600px; height: 400px;"></div>

</div> <!-- end of table contents column -->

</div> <!-- 		End of Container -->


<script>

function saveId(savingId){
	var idSaved;
	idSaved = savingId.id;

	window.location.href = "coordinfo.php?idSaved=" + idSaved;
	exit;
}



</script>

<script src="js/pagination.js"></script>



<?php include 'includes/home_footer.php' ?>