<?php include 'partials/header.php'; ?>

<?php if(loggedIn()): ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <h4 class="mb-4">Edit Contact</h4>

                    <form method="post" action="#" autocomplete="off" class="mb-3">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="Levan" tabindex="1">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="Doe" tabindex="2">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="599000000" tabindex="3">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="leo@mail.com" tabindex="4">
                        </div>
                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="https://facebook.com/levan" tabindex="5">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit" tabindex="6">Update</button>
                            <a href="contacts-read.php" class="btn btn-link">Go Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

<?php else: ?>
    <?php redirect("index.php"); ?>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>