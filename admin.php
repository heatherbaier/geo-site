<?php include 'includes/home_header.php' ?>
<?php include 'includes/admin_check.php' ?>
<?php include 'includes/greeting.php' ?>


<div class="grid-container">
	<div class="item1 admin-button">
		<span style="text-align: center" class="material-symbols-outlined">edit</span>
		<h3>Add a blog post</h3>
	</div>
	<div class="item2 admin-button" onclick="window.location='add_user.php'">
		<span class="material-symbols-outlined">group_add</span>
		<h3>Add a user</h3>
	</div>
	<div class="item3 admin-button" onclick="window.location='remove_user.php'">
		<span class="material-symbols-outlined">person_remove</span>
		<h3>Remove a user</h3>
	</div>
	<div class="item4 admin-button" onclick="window.location='remove_user.php'">
		<span class="material-symbols-outlined">account_circle</span>
		<h3>Think of something lol</h3>
	</div>	

</div>

<?php include 'includes/home_footer.php' ?>