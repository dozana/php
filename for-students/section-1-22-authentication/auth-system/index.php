<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<h2 class="mb-4">Home</h2>
				
				<?php
					$sql = "SELECT * FROM users";
					$result = query($sql);

					confirm($result);

					$row = fetchArray($result);
					echo $row['username'];
				?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>