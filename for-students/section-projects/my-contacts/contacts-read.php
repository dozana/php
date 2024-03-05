<?php include 'partials/header.php'; ?>

<?php if(loggedIn()): ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <h4 class="mb-4">All Contacts</h4>

                    <table class="table table-bordered table-hover mb-3">
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
                        <?php
                        $sql = "SELECT * FROM contacts";
                        $result = query($sql);

                        while ($row = fetchArray($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td class="text-center">
                                    <div class="d-inline">
                                        <a href="contacts-view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">View</a>
                                    </div>
                                    <div class="d-inline">
                                        <a href="contacts-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <form method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_contact" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <a href="contacts-create.php" class="btn btn-primary btn-sm mb-3">New Contact</a>

                    <?php
                    displayMessage();

                    if(isset($_POST['id'])) {
                        $deleteId = escape($_POST['id']);
                        if(deleteContact($deleteId)) {
                            setMessage("Record has been deleted successfully.");
                        } else {
                            setMessage("Failed to delete record.");
                        }

                        redirect("contacts-read.php");
                    }
                    ?>

                </div>
            </div>
        </div>
    </main>

<?php else: ?>
    <?php redirect("index.php"); ?>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>