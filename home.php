<!-- This file contains the content for the home/landing page for the website. Header/footer is included in corresponding files -->

<?php include 'includes/home_header.php' ?>
<!--<?php include 'includes/greeting.php' ?>-->

<div id='landingPage'>

<h2 id="missionStatement">The mission statement goes here! Right now, this is filler text.</h2>

<div id ="optionsHomePageContent">

    <div class="columnHomePage">
        <div class = "section">
            <a href="school_explorer.php"><button class="pageButton"> School Explorer </button></a>
            <p class = "pageDescription"> The school explorer provides a platform to search for schools, view specific information and location regarding schools, and download selected datasets. </p>
        </div>
        <div class = "section">
            <a href="sdg_explorer.php"><button class="pageButton"> Sustainable Development Goals Explorer </button></a>
            <p class = "pageDescription">explanation of purpose of sustainable development goals explorer page (filler text filler text filler text 
                text filler text filler text filler text filler text filler text filler text filler text filler text)</p>
        </div>
        <div class = "section">
            <a href="topic_explorer.php"><button class="pageButton">Topic Explorer</button></a>
            <p class = "pageDescription">explanation of purpose of topic explorer page (filler text filler text filler text 
                text filler text filler text filler text filler text filler text filler text filler text filler text)</p>
        </div>
    </div>

    <div class="columnHomePage">
        <div class = "section">
            <a href="statements.php"><button class="pageButton"> Statements of Context, Ethics and Accountability</button></a>
            <p class = "pageDescription">explanation of purpose of statement page (filler text filler text filler text 
                text filler text filler text filler text filler text filler text filler text filler text filler text)</p>
        </div>
        <div class = "section">
            <a href="export_download.php"><button class="pageButton"> Blogs and Posts</button></a>
            <p class = "pageDescription">explanation of purpose of blogs and posts page (filler text filler text filler text  
                text filler text filler text filler text filler text filler text filler text filler text filler text)</p>
        </div>
        <div class = "section">
            <a href="about_us.php"><button class="pageButton"> About Us </button></a>
            <p class = "pageDescription">explanation of purpose of about page (filler text filler text filler text 
                text filler text filler text filler text filler text filler text filler text filler text filler text)</p>
        </div>
    </div>  

    <div class = "columnHomePage">
        <img id = 'homepageimage' src = "assets/index_image.jpeg">
        <!--include school map here -->
        <a href="school_map.php"><button id="schoolMapButtonBox"> Interactive World-Wide School Map</button></a>        
    </div>
    
</div>



</div>
<!--<h1>WE IN THE NON-ADMIN PAGE YO</h1>-->

<?php include 'includes/home_footer.php' ?>
