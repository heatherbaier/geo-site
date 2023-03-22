<?php include 'includes/home_header.php' ?>
<?php include 'includes/admin_check.php' ?>


<style>

body{

background-color: #eee; 
}

table th , table td{
text-align: center;
}

table tr:nth-child(even){
background-color: #BEF2F5
}

.pagination li:hover{
cursor: pointer;
}
    table tbody tr {
        display: none;
    }


</style>



<div style="width: 90%; height: 100px; background-color: green; box-shadow: 0px 8px 16px 0px #999; color: #999; border-radius: 4px; text-align: center">

</div>



<div class="container">
	<h2>Select Number Of Rows</h2>
		<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			<select class  ="form-control" name="state" id="maxRows">
				<option value="20000">Show ALL Rows</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="25">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>	
		</div>

<!--		Start Pagination -->
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

<?php

session_start();

include('config.php');

//$result = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id IN ('NIG-000000','NIG-000001', 'NIG-000002', 'NIG-000003', 'NIG-000004', 'NIG-000005', 'NIG-000006')");

//CREATE UNIQUE RESULT ARRAYS FOR EACH OF THE DIFFERENT COUNTRIES, get unique attributes
	//BHR - no need for fetch/offset
	/*$resultBHR = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BHR-%' ");

	//TAN - fetch/offset by 1000 x 16
	$resultTANONE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 0");
	$resultTANTWO = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 1000");
	$resultTANTHREE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 2000");
	$resultTANFOUR = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 3000");
	$resultTANFIVE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 4000");
	$resultTANSIX = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 5000");
	$resultTANSEVEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 6000");
	$resultTANEIGHT = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 7000");
	$resultTANNINE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 8000");
	$resultTANTEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 9000");
	$resultTANELEVEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 10000");
	$resultTANTWELVE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 11000");
	$resultTANTHIRTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 12000");
	$resultTANFOURTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 13000");
	$resultTANFIFTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 14000");
	$resultTANSIXTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'TAN-%' LIMIT 1000 OFFSET 15000");
	

	//BOL - fetch/offset by 1000 x 15
	$resultBOLONE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 0");
	$resultBOLTWO = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 1000");
	$resultBOLTHREE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%'LIMIT 1000 OFFSET 2000 ");
	$resultBOLFOUR = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 3000");
	$resultBOLFIVE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 4000");
	$resultBOLSIX = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 5000");
	$resultBOLSEVEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 6000");
	$resultBOLEIGHT = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 7000");
	$resultBOLNINE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 8000");
	$resultBOLTEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 9000");
	$resultBOLELEVEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 10000");
	$resultBOLTWELVE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 11000");
	$resultBOLTHIRTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 12000");
	$resultBOLFOURTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 13000");
	$resultBOLFIFTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'BOL-%' LIMIT 1000 OFFSET 14000");
	*/

	//SLE - fetch/offset by 1000 x 4
	/*$resultSLEONE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'SLE-0%' LIMIT 1000 OFFSET 0");
	$resultSLETWO = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'SLE-0%' LIMIT 1000 OFFSET 1000 ");
	$resultSLETHREE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'SLE-0%' LIMIT 1000 OFFSET 2000 ");
	$resultSLEFOUR = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'SLE-0%' LIMIT 1000 OFFSET 3000 ");
	*/

	$resultNIG = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial`LIMIT 10000 OFFSET 0");
	$resultNIGTWO = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 10000");
	$resultNIGTHREE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 20000");
	$resultNIGFOUR = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 30000");
	$resultNIGFIVE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 40000");
	/*$resultNIGSIX = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 50000");
	/*$resultNIGSEVEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 60000");
	$resultNIGEIGHT = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 70000");
	$resultNIGNINE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 80000");
	$resultNIGTEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 10000 OFFSET 90000");
	/*$resultNIGELEVEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 20000");
	$resultNIGTWELVE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 22000");
	$resultNIGTHIRTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 24000");
	$resultNIGFOURTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 26000");
	$resultNIGFIFTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 28000");
	$resultNIGSIXTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 30000");
	$resultNIGSEVENTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 32000");
	$resultNIGEIGHTEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 34000");
	$resultNIGNINETEEN = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 36000");
	$resultNIGTWENTY = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 38000");
	$resultNIGTWENTYONE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 40000");
	$resultNIGTWENTYTWO = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 42000");
	$resultNIGTWENTYTHREE = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 44000");
	$resultNIGTWENTYFOUR = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` LIMIT 2000 OFFSET 46000");*/
	

	
	//$resultPHL = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'PHL-%' ");
		// ^ too many, takes too long to load
	//$resultPER = mysqli_query($con, "SELECT geo_id, longitude, latitude FROM `spatial` WHERE geo_id LIKE 'PER-%' ");
		// ^ too many, takes too long to load


	//--> either through a loop or manually,, loop allows this not to have to be updated with the data base is updated but manually is probably easier to implement
	//check to see which is faster
//try fetching by one array at a time, either consecutively in a loop or in seperate loops, check to see which is faster

//Text above table: echo "<h2 style='font-family: 'Montserrat', sans-serif;'> GEO-IDS and Location Information:</h2>";


echo "<table class='table table-striped table-class' id='table-id' style='overflow: visible'>
<thead>
    <tr>
        <th>GEO ID</th>
        <th>Longitude</th>
        <th>Latitude</th>
    </tr>
</thead>

<tbody>";

//while($row = mqsqli_fetch_array($result))


while((
	/*$row = mysqli_fetch_array($resultBHR) 
	or $row = mysqli_fetch_array($resultTANONE)
	or $row = mysqli_fetch_array($resultTANTWO)
	or $row = mysqli_fetch_array($resultTANTHREE)
	or $row = mysqli_fetch_array($resultTANFOUR)
	or $row = mysqli_fetch_array($resultTANFIVE)
	or $row = mysqli_fetch_array($resultTANSIX)
	or $row = mysqli_fetch_array($resultTANSEVEN)
	or $row = mysqli_fetch_array($resultTANEIGHT)
	or $row = mysqli_fetch_array($resultTANNINE)
	or $row = mysqli_fetch_array($resultTANTEN)
	or $row = mysqli_fetch_array($resultTANELEVEN)
	or $row = mysqli_fetch_array($resultTANTWELVE)
	or $row = mysqli_fetch_array($resultTANTHIRTEEN)
	or $row = mysqli_fetch_array($resultTANFOURTEEN)
	or $row = mysqli_fetch_array($resultTANFIFTEEN)
	or $row = mysqli_fetch_array($resultTANSIXTEEN)*/
	/*or $row = mysqli_fetch_array($resultBOLONE)
	or $row = mysqli_fetch_array($resultBOLTWO)
	or $row = mysqli_fetch_array($resultBOLTHREE)
	or $row = mysqli_fetch_array($resultBOLFOUR)
	or $row = mysqli_fetch_array($resultBOLFIVE)
	or $row = mysqli_fetch_array($resultBOLSIX)
	or $row = mysqli_fetch_array($resultBOLSEVEN)
	or $row = mysqli_fetch_array($resultBOLEIGHT)
	or $row = mysqli_fetch_array($resultBOLNINE)
	or $row = mysqli_fetch_array($resultBOLTEN)
	or $row = mysqli_fetch_array($resultBOLELEVEN)
	or $row = mysqli_fetch_array($resultBOLTWELVE)
	or $row = mysqli_fetch_array($resultBOLTHIRTEEN)
	or $row = mysqli_fetch_array($resultBOLFOURTEEN)
	or $row = mysqli_fetch_array($resultBOLFIFTEEN)*/
	$row = mysqli_fetch_array($resultNIG) 
	or $row = mysqli_fetch_array($resultNIGTWO)
	or $row = mysqli_fetch_array($resultNIGTHREE)
	or $row = mysqli_fetch_array($resultNIGFOUR)
	or $row = mysqli_fetch_array($resultNIGFIVE)
	/*or $row = mysqli_fetch_array($resultNIGSIX)
	/*or $row = mysqli_fetch_array($resultNIGSEVEN)
	or $row = mysqli_fetch_array($resultNIGEIGHT)
	or $row = mysqli_fetch_array($resultNIGNINE)
	or $row = mysqli_fetch_array($resultNIGTEN)
	/*or $row = mysqli_fetch_array($resultNIGELEVEN)
	or $row = mysqli_fetch_array($resultNIGTWELVE)
	or $row = mysqli_fetch_array($resultNIGTHIRTEEN)
	or $row = mysqli_fetch_array($resultNIGFOURTEEN)
	or $row = mysqli_fetch_array($resultNIGFIFTEEN)
	or $row = mysqli_fetch_array($resultNIGSIXTEEN)
	or $row = mysqli_fetch_array($resultNIGSEVENTEEN)
	or $row = mysqli_fetch_array($resultNIGEIGHTEEN)
	or $row = mysqli_fetch_array($resultNIGNINETEEN)
	or $row = mysqli_fetch_array($resultNIGTWENTY)
	or $row = mysqli_fetch_array($resultNIGTWENTYONE)
	or $row = mysqli_fetch_array($resultNIGTWENTYTWO)
	or $row = mysqli_fetch_array($resultNIGTWENTYTHREE)
	or $row = mysqli_fetch_array($resultNIGTWENTYFOUR)*/
	/*or $row = mysqli_fetch_arry($resultSLEONE)
	or $row = mysqli_fetch_arry($resultSLETWO)
	or $row = mysqli_fetch_arry($resultSLETHREE)
	or $row = mysqli_fetch_arry($resultSLEFOUR)*/
)){


//$uname = $row['username'];
echo "<tr>";
	//echo "<td>" . ["test"] . "</td>";
    echo "<td>" . $row['geo_id'] . "</td>";
    echo "<td>" . $row['longitude'] . "</td>";
    echo "<td>" . $row['latitude'] . "</td>";
echo "</tr>";
}

echo "</tbody></table>";

?>



</div> <!-- 		End of Container -->


<script src="js/pagination.js"></script>



<!--  Developed By Yasser Mas -->

<?php include 'includes/home_footer.php' ?>