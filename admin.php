<?php include 'includes/home_header.php' ?>
<?php include 'includes/admin_check.php' ?>


<h1 style="padding-left: 20px; font-family: 'Montserrat', sans-serif;">Welcome, <?php echo $_SESSION['user_name'] ?>!</h1>


<div class="grid-container">
	<div class="item1 admin-button">
		<span style="text-align: center" class="material-symbols-outlined">edit</span>
		<h3>Add a blog post</h3>
	</div>
	<div class="item2 admin-button" onclick="window.location='add_user.php'">
		<span class="material-symbols-outlined">account_circle</span>
		<h3>Add a user</h3>
	</div>
	<div class="item3 admin-button" onclick="window.location='remove_user.php'">
		<span class="material-symbols-outlined">account_circle</span>
		<h3>Remove a user</h3>
	</div>
	<div class="item4 admin-button" onclick="window.location='remove_user.php'">
		<span class="material-symbols-outlined">account_circle</span>
		<h3>Think of something lol</h3>
	</div>	

</div>

<?php include 'includes/home_footer.php' ?>