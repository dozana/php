<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<h2 class="mb-4">Contact Us</h2>
				
				<form action="#" method="POST">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="mb-3">
						<label for="message" class="form-label">Message</label>
						<textarea class="form-control" id="message" name="message" rows="5"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>

			</div>
		</div>
	</div>
</main>

<?php include 'includes/footer.php'; ?>