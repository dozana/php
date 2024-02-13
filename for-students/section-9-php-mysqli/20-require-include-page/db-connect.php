<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$objConnect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$objConnect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
