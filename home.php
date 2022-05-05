<?php include 'header.php' ?>

<h1>Hello!</p>

<?php echo "phpeeee yo" ?>

<?php 
    session_start();
    echo $_SESSION ;
    echo $_SESSION['user_id'];
?>


<h1>Hello<?php echo $_SESSION['user_id'] ?>! You did it!</h1>

<?php
echo "Today is " . date("Y/m/d h:i:sa")  . "<br>";
?>


<?php include 'footer.php' ?>
