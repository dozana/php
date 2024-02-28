<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php if(loggedIn()) { redirect('dashboard.php'); } ?>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-12">

				<h2 class="mb-4">Login</h2>

				<form method="post" action="#" autocomplete="off">
					<div class="mb-3">
						<label for="email" class="form-label">E-Mail</label>
						<input type="email" class="form-control" id="email" name="email" tabindex="1">
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" tabindex="2">
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="remember" tabindex="3" name="remember">
						<label class="form-check-label" for="remember">Remember Me</label>
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-primary" name="submit" tabindex="4">Log In</button>
						<a href="recover.php" class="btn btn-link" tabindex="5">Forgot Password?</a>
					</div>
				</form>

				<?php 
					displayMessage();
					validateUserLogin();
				?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>