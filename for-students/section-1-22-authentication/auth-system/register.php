<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-12">

				<h2 class="mb-4">Register</h2>

				<form method="post" action="#">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="first_name" class="form-label">First Name</label>
								<input type="text" class="form-control" id="first_name" name="first_name" tabindex="1">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="last_name" class="form-label">Last Name</label>
								<input type="text" class="form-control" id="last_name" name="last_name" tabindex="2">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" id="username" name="username" tabindex="3">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">E-Mail Address</label>
						<input type="email" class="form-control" id="email" name="email" tabindex="4">
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" tabindex="5">
					</div>
					<div class="mb-3">
						<label for="confirm-password" class="form-label">Confirm Password</label>
						<input type="password" class="form-control" id="confirm-password" name="confirm_password" tabindex="6">
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-primary" name="submit" tabindex="7">Register</button>
					</div>
				</form>

				<?php validate_user_registration(); ?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>