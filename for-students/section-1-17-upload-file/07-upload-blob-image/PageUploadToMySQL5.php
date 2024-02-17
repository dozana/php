<!DOCTYPE html>
<html>
<head>
    <title>upload blob image</title>
</head>
<body>
<?php
// Database connection
$objConnect = mysqli_connect("localhost", "root", "", "test");
if (!$objConnect) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Update record
$FilesID = isset($_GET["FilesID"]) ? $_GET["FilesID"] : "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txtName = isset($_POST["txtName"]) ? $_POST["txtName"] : "";
    if (!empty($txtName)) {
        $sql = "UPDATE files SET Name = '$txtName' WHERE FilesID = '$FilesID'";
        $result = mysqli_query($objConnect, $sql);
        if ($result) {
            echo "Name updated successfully.<br>";
        } else {
            echo "Error updating name: " . mysqli_error($objConnect) . "<br>";
        }
    }

    if ($_FILES["filUpload"]["name"] != "") {
        // Read file binary
        $fp = fopen($_FILES["filUpload"]["tmp_name"], "r");
        $ReadBinary = fread($fp, filesize($_FILES["filUpload"]["tmp_name"]));
        fclose($fp);
        $FileData = addslashes($ReadBinary);

        // Update new file
        $sql = "UPDATE files SET FilesName = '$FileData' WHERE FilesID = '$FilesID'";
        $result = mysqli_query($objConnect, $sql);
        if ($result) {
            echo "Copy/Upload Complete<br>";
        } else {
            echo "Error updating file: " . mysqli_error($objConnect) . "<br>";
        }
    }
}

// Close database connection
mysqli_close($objConnect);
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>
