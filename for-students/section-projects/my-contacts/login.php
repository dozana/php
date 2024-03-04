<?php include 'partials/header.php'; ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <h4 class="mb-4">My Contacts</h4>

                <form method="post" action="#" autocomplete="off">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mails</label>
                        <input type="email" class="form-control" id="email" name="email" tabindex="1">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" tabindex="2">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit" tabindex="3">Log In</button>
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

<?php include 'partials/footer.php'; ?>