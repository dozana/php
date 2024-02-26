<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6 col-sm-12">

				<h2 class="mb-4">Recover Password</h2>

				<form method="POST" action="#" autocomplete="off">
					<div class="mb-3">
						<label for="email" class="form-label">E-Mail</label>
						<input type="email" class="form-control" id="email" name="email" tabindex="1">
					</div>
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-xs-6">
							<input type="submit" name="cancel-submit" id="cancel-submit" tabindex="2" class="form-control btn btn-danger" value="Cancel" />
						</div>
						<div class="col-lg-6 col-sm-6 col-xs-6">
							<input type="submit" name="recover-submit" id="recover-submit" tabindex="3" class="form-control btn btn-success" value="Send Password Reset Link" />
						</div>
					</div>
					<input type="hidden" class="hide" name="token" id="token" value="<?php echo isset($_SESSION['token']) ? $_SESSION['token'] : tokenGenerator(); ?>">
				</form>

				<?php recoverPassword();?>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>
