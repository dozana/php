<?php
session_start();

// Check if the user is not logged in and redirect to index.php
if(!isset($_SESSION["strUser"]) || !isset($_SESSION["strPass"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>
<body>
    <h1>Page 2</h1>
    <p>This is page 2. You are logged in.</p>
		<a href="logout.php">Logout</a>
		<br><br><br>
		<a href="page1.php">Page1</a>
</body>
</html>
