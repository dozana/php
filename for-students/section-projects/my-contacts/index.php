<?php include 'partials/header.php'; ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <h4 class="mb-4">My Contacts</h4>

                <?php if(loggedIn()): ?>
                    <p>Welcome <a href="logout.php">Log out</a></p>
                <?php else: ?>
                    <p>This is my contact list, please <a href="login.php">Log in</a></p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php include 'partials/footer.php'; ?>