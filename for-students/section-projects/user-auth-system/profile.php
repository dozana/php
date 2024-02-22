<?php
session_start();
include('config.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// Fetch user's information from the database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to update user's information
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];

    $update_sql = "UPDATE users SET username='$newUsername', email='$newEmail' WHERE username='$username'";
    if (mysqli_query($conn, $update_sql)) {
        // Update session username if changed
        $_SESSION['username'] = $newUsername;
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Profile</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="new_username" value="<?php echo $row['username']; ?>"><br><br>
        Email: <input type="email" name="new_email" value="<?php echo $row['email']; ?>"><br><br>
        <input type="submit" value="Update Profile">
    </form>
</body>
</html>
