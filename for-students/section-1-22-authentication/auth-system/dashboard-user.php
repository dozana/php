<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<h2 class="mb-4">User Dashboard</h2>
				<?php
				if(loggedIn()) {
					echo "Welcome, " . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
				} else {
					redirect("index.php");
				}
				?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>