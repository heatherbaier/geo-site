<?php include 'includes/header.php' ?>

<div id="wrapper" class="active">
      

    <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
            <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">     
            <li><a href="home.php">Home<span class="material-symbols-outlined dash-icon">dashboard</span></a></li>
            <li ><a  class="dash-nav" id="dash-nav-schools" >School Explorer<span class="material-symbols-outlined dash-icon">school</span></a></li>
            <li><a href="topic_explorer.php">Topic Explorer<span class="material-symbols-outlined dash-icon">database</span></a></li>
            <li><a  class="dash-nav" id="dash-nav-sdg" >SDG Explorer<span class="material-symbols-outlined dash-icon">bar_chart</span></a></li>
            <li><a  class="dash-nav" id="dash-nav-export" >Export Manager<span class="material-symbols-outlined dash-icon">history</span></a></li>
            <li><a  class="dash-nav" id="dash-nav-history" href="download_history.php">Download History<span class="material-symbols-outlined dash-icon">file_download</span></a></li>
            
            <?php
                session_start();
                $role = $_SESSION['role'];
                if ($_SESSION['role'] == "Admin") {
                    echo "<li><a href='admin.php'>Admin Dashboard<span class='material-symbols-outlined dash-icon'>file_download</span></a></li>";  
                }
            ?>
        
        
        </ul>
    </div>
          
    <!-- Page content -->
    <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
                <div class="col-md-12">
                    <!-- <p class="well lead">An Experiment using the sidebar template from startbootstrap.com which I integrated in my website (<a href="http://animeshmanglik.name">animeshmanglik.name</a>)</p>
                    <p class="well lead">Click on the Menu to Toggle Sidebar . Hope you enjoy it!</p>  -->