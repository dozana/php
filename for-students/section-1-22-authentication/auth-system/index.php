<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
	
<div class="container">
	<div class="jumbotron">
		<h1 class="text-center">Home Page</h1>
	</div>
	<?php
		$sql = "SELECT * FROM users";
		$result = query($sql);

		confirm($result);

		$row = fetchArray($result);
		echo $row['username'];
	?>
</div>

<?php include 'includes/footer.php'; ?>