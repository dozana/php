<html>
<head>
<title>Upload image and edit</title>
</head>
<body>
<?php
// Database connection
$mysqli = mysqli_connect("localhost", "root", "", "test");
if (!$mysqli) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Get FilesID from the URL parameter
$FilesID = $_GET["FilesID"];

// Update record
$txtName = $_POST["txtName"];
$sqlUpdateName = "UPDATE files SET Name = '$txtName' WHERE FilesID = '$FilesID'";
$resultUpdateName = mysqli_query($mysqli, $sqlUpdateName);
if (!$resultUpdateName) {
    die("Error updating name: " . mysqli_error($mysqli));
}

if ($_FILES["filUpload"]["name"] != "") {
    // Move uploaded file
    if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfile/" . $_FILES["filUpload"]["name"])) {
        // Delete old file
        $hdnOldFile = $_POST["hdnOldFile"];
        @unlink("myfile/" . $hdnOldFile);

        // Update new file
        $sqlUpdateFile = "UPDATE files SET FilesName = '" . $_FILES["filUpload"]["name"] . "' WHERE FilesID = '$FilesID'";
        $resultUpdateFile = mysqli_query($mysqli, $sqlUpdateFile);
        if (!$resultUpdateFile) {
            die("Error updating file: " . mysqli_error($mysqli));
        }

        echo "Copy/Upload Complete<br>";
    } else {
        echo "Failed to copy/upload file<br>";
    }
}

// Close database connection
mysqli_close($mysqli);
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>
