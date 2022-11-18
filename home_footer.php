


<script>
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});

$(".dash-nav").click(function(e) {
        e.preventDefault();
        var getClass = this.id;
        console.log(getClass);
        $('.dash-nav').removeClass('active'); 
        console.log(document.getElementById(getClass));
        document.getElementById(getClass).className += " active";
        console.log(document.getElementById(getClass));
        // document.getElementById(getClass).style.color = "white";     
});

</script>

<?php include 'includes/footer.php' ?>