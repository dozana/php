<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<?php
if ($_SESSION['role'] != "admin") {
	echo "<p>Access Denied!</p>";
	exit();
}
?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<h2 class="mb-4">Admin Dashboard</h2>
				<?php
				if(loggedIn()) {
					echo "Welcome";
				} else {
					redirect("index.php");
				}

				echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
				?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>