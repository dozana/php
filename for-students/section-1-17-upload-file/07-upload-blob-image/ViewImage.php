<?php
// Database connection
$objConnect = mysqli_connect("localhost", "root", "", "test");
if (!$objConnect) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Retrieve file name based on FilesID
$FilesID = isset($_GET["FilesID"]) ? $_GET["FilesID"] : "";
$sql = "SELECT FilesName FROM files WHERE FilesID = '$FilesID'";
$result = mysqli_query($objConnect, $sql);
if (!$result) {
    die("Error Query: " . mysqli_error($objConnect));
}
$objResult = mysqli_fetch_array($result);

echo $objResult["FilesName"];

// Close database connection
mysqli_close($objConnect);
?>
