<?php 

	session_start();

	$role = $_SESSION['role'];
	$uid = $_SESSION['user_id'];
                
	if ($_SESSION['role'] != "Admin") {
		header("Location: home.php");
	} 

	if (is_null($uid)) {
		header("Location: index.php");
	}

?>