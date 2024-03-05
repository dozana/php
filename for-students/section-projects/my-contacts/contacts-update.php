<?php
include 'partials/header.php';

if(loggedIn()) {
    if(isset($_POST['submit'])) {
        global $conn;

        $contact_id = $_POST['contact_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];

        // Sanitize input data to prevent SQL injection
        $contact_id = intval($contact_id);
        $first_name = mysqli_real_escape_string($conn, $first_name);
        $last_name = mysqli_real_escape_string($conn, $last_name);
        $mobile = mysqli_real_escape_string($conn, $mobile);
        $email = mysqli_real_escape_string($conn, $email);
        $facebook = mysqli_real_escape_string($conn, $facebook);

        // Update contact details in the database
        $sql = "UPDATE contacts SET 
                    first_name='$first_name', 
                    last_name='$last_name', 
                    mobile='$mobile', 
                    email='$email', 
                    facebook='$facebook' WHERE id=$contact_id";
        $result = query($sql);

        if($result) {
            echo "<p>Contact updated successfully.</p>";
        } else {
            echo "<p>Error updating contact: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>No data submitted.</p>";
    }
} else {
    redirect("index.php");
}

include 'partials/footer.php';
?>
