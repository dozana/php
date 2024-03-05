<?php
include 'partials/header.php';

if(loggedIn()) {
    if(isset($_POST['contact_id'])) {
        // Include or define your functions here
        $contact_id = $_POST['contact_id'];

        // Sanitize input data to prevent SQL injection
        $contact_id = intval($contact_id);

        // Delete contact from the database
        $sql = "DELETE FROM contacts WHERE id = $contact_id";
        $result = query($sql);

        if($result) {
            echo "<script>
                    swal('Success!', 'Contact deleted successfully.', 'success').then((value) => {
                        window.location.href = 'contacts-read.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    swal('Error!', 'Failed to delete contact.', 'error').then((value) => {
                        window.location.href = 'contacts-read.php';
                    });
                  </script>";
        }
    } else {
        echo "<script>
                swal('Error!', 'Invalid request.', 'error').then((value) => {
                    window.location.href = 'contacts-read.php';
                });
              </script>";
    }
} else {
    redirect("index.php");
}

include 'partials/footer.php';
?>
