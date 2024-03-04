<?php include 'partials/header.php'; ?>

<?php if(loggedIn()): ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4 class="mb-4">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="card text-center mb-3">
                        <div class="card-header">
                            Contacts
                        </div>
                        <div class="card-body">
                            <h1>0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php else: ?>
    <?php redirect("index.php"); ?>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>