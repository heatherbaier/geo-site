<?php include 'includes/header.php' ?>

<!-- Hello school list page!! -->


<div>
    <div style="border-color: gray; border-width: 10px; border-radius: 5px; float: left; width: 30%; margin-left: 5px; background-color: gray;">

        <?php
            session_start();
            include('config.php');

            // $result = mysqli_query($con, "SELECT DISTINCT ADM0 FROM `ids`");
            $result = mysqli_query($con, "SELECT DISTINCT SUBSTRING(adm0,1,3)  FROM `ids`");
            $arr = mysqli_fetch_array($result);

            echo "
                    <select id='country' name='country' size='10' style='width:50%'>";

            foreach ($arr as $value) {
                echo "<option value=$value>$value</option>";
            }

            echo "</select>";
        ?>
    </div>


    <div style="background-color: red; float: right; width: 70%">
        Right
    </div>


</div>

<?php include 'includes/footer.php' ?>
