<?php include 'partials/header.php'; ?>

<?php if(loggedIn()): ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <h4 class="mb-4">Edit Contact</h4>

                    <?php
                    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $contact_id = intval($_GET['id']);
                        $sql = "SELECT * FROM contacts WHERE id = " . $contact_id;
                        $result = query($sql);
                        $row = fetchArray($result);

                        if($row) {
                            ?>
                            <form method="post" action="#" autocomplete="off" class="mb-3">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" tabindex="1">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" tabindex="2">
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($row['mobile']); ?>" tabindex="3">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" tabindex="4">
                                </div>
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo htmlspecialchars($row['facebook']); ?>" tabindex="5">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
                                    <button type="submit" class="btn btn-primary" name="submit" tabindex="6">Update</button>
                                    <a href="contacts-read.php" class="btn btn-link">Go Back</a>
                                </div>
                            </form>

                            <?php
                            if(isset($_POST['submit'])) {
                                $contact_id = intval($_POST['contact_id']);
                                $first_name = escape($_POST['first_name']);
                                $last_name = escape($_POST['last_name']);
                                $mobile = escape($_POST['mobile']);
                                $email = escape($_POST['email']);
                                $facebook = escape($_POST['facebook']);

                                $sql = "UPDATE contacts SET 
                                            first_name='$first_name', 
                                            last_name='$last_name', 
                                            mobile='$mobile', 
                                            email='$email', 
                                            facebook='$facebook' WHERE id=$contact_id";
                                $result = query($sql);

                                if($result) {
                                    redirect('contacts-read.php');
                                } else {
                                    echo "<p>Something went wrong</p>";
                                }
                            }
                            ?>

                            <?php
                        } else {
                            // Redirect if contact with given ID doesn't exist
                            redirect("index.php");
                        }
                    } else {
                        // Redirect if 'id' parameter is missing or invalid
                        redirect("index.php");
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
