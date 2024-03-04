<?php include 'partials/header.php'; ?>

<?php if(loggedIn()): ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <h4 class="mb-4">Dashboard</h4>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-Mail</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@mail.com</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@mail.com</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

<?php else: ?>
    <?php redirect("index.php"); ?>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>