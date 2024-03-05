<?php include 'partials/header.php'; ?>

<?php if(loggedIn()): ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <h4 class="mb-4">View Contact</h4>

                    <table class="table table-bordered table-hover mb-3">
                        <tbody>
                        <?php
                        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $contact_id = intval($_GET['id']);
                            $sql = "SELECT * FROM contacts WHERE id = " . $contact_id;
                            $result = query($sql);

                            while ($row = fetchArray($result)) {
                                ?>
                                <tr>
                                    <th class="col-3">ID</th>
                                    <td class="col-9"><?php echo $row['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td><?php echo $row['first_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td><?php echo $row['last_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>E-Mail</th>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                                <?php
                            }

                        } else {
                            // Redirect if 'id' parameter is missing or invalid
                            redirect("index.php");
                        }
                        ?>

                        </tbody>
                    </table>

                    <a href="contacts-read.php" class="btn btn-primary btn-sm">Go Back</a>

                </div>
            </div>
        </div>
    </main>

<?php else: ?>
    <?php redirect("index.php"); ?>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>