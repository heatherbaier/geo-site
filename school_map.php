<?php include 'includes/header.php' ?>




<div class="map-wrapper">
    <div class="box" id="mapid"></div>
</div>


<script src="js/map.js"></script>


<script>
    $.ajax({

        type : "POST",  //type of method
        url  : "add_school_coords.php",  //your page
        data : {},// passing the values

        success: function(data){  

            data = JSON.parse(data);

            console.log("done!")
            console.log(data);

            for (var i = 0; i < data.length; i++)
            {
                console.log(data[i])
            }


            // window.location = "school_map.php";
        }

    });
</script>


<?php include 'includes/footer.php' ?>
