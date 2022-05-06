<?php include 'includes/home_header.php' ?>

<?php 
	session_start();
	$uid = $_SESSION['user_id'];
	if (is_null($uid)) {
		header("Location: index.php");
	}
?>

<h1>WE IN THE NON-ADMIN PAGE YO</h1>

<?php include 'includes/home_footer.php' ?>
