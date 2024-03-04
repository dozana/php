<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "my_contacts";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn) {
    die("Database Connection Error: " . mysqli_error($conn));
}
?>