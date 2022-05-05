<?php include 'includes/home_header.php' ?>

<h1 style="padding-left: 20px;">Welcome, <?php echo $_SESSION['user_name'] ?>!</h1>


<div class="grid-container">
	<div class="item1">
		<span style="text-align: center" class="material-symbols-outlined">edit</span>
		<h3>Add a blog post</h3>
	</div>
	<div class="item2">
		<span class="material-symbols-outlined">account_circle</span>
		<h3>Add a user</h3>
	</div>
</div>

<?php include 'includes/home_footer.php' ?>