<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-12">

				<h2 class="mb-4">Enter Code</h2>

				<form method="post" action="#" autocomplete="off">
					<div class="mb-3">
						<input type="text" name="code" id="code" tabindex="1" class="form-control form-control-lg" placeholder="##########" value="" autocomplete="off" required>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<input type="submit" name="code-cancel" id="code-cancel" tabindex="2" class="btn btn-danger form-control" value="Cancel">
							</div>
							<div class="col-6">
								<input type="submit" name="code-submit" id="recover-submit" tabindex="2" class="btn btn-success form-control" value="Continue">
							</div>
						</div>
					</div>
					<input type="hidden" class="hide" name="token" id="token" value="">
				</form>

				<?php confirmCode(); ?>

				<div class="alert alert-success alert-dismissible fade show" role="alert">
						We have sent a security code to your email <span>john@company.com</span>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

			</div>
		</div>
	</div>
</main>


<?php include 'includes/footer.php'; ?>