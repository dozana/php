<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-12">

				<h2 class="mb-4">Reset Password</h2>

				<form method="post" action="#">
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" tabindex="1" required>
					</div>
					<div class="mb-3">
						<label for="confirm-password" class="form-label">Confirm Password</label>
						<input type="password" class="form-control" id="confirm-password" name="confirm_password" tabindex="2" required>
					</div>
					<div class="mb-3">
						<div class="row">
							<button type="submit" class="btn btn-primary" name="submit" tabindex="3">Reset Password</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>