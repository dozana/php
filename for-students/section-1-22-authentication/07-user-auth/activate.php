<?php
$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sid = mysqli_real_escape_string($conn, $_GET['sid']);
$uid = mysqli_real_escape_string($conn, $_GET['uid']);

$sql = "SELECT * FROM member2 WHERE SID = '$sid' AND UserID = '$uid'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Activate Invalid !";
} else {
    $sql = "UPDATE member2 SET Active = 'Yes' WHERE SID = '$sid' AND UserID = '$uid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Activate Successfully !";
        echo '<a href="login.php">Go Home</a>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
