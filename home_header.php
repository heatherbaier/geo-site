
<!-- contains content for header for home page: logo, title, and drop down menu for navigation-->

<?php include 'includes/header.php' ?>

<div id="wrapper" class="active">

            <?php
                session_start();
                $role = $_SESSION['role'];
                if ($_SESSION['role'] == "Admin") {
                    echo "<li><a href='admin.php'>Admin Dashboard<span class='material-symbols-outlined dash-icon'>file_download</span></a></li>";  
                }
            ?>
        
        

    </div>