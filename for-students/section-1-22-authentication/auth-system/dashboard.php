<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<h2 class="mb-4">Dashboard</h2>
				<?php
				if(loggedIn()) {
					echo "logged in";
				} else {
					redirect("index.php");
				}
				?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>