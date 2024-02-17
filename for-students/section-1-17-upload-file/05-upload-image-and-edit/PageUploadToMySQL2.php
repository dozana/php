<!DOCTYPE html>
<html>
<head>
<title>Upload image and edit</title>
</head>
<body>
<?php
if (move_uploaded_file($_FILES["filUpload"]["tmp_name"], "myfile/" . $_FILES["filUpload"]["name"])) {
    echo "Copy/Upload Complete<br>";

    // Database connection
    $mysqli = mysqli_connect("localhost", "root", "", "test");
    if (!$mysqli) {
        die("Error Connect to Database: " . mysqli_connect_error());
    }

    // Insert Record
    $txtName = $_POST["txtName"];
    $filesName = $_FILES["filUpload"]["name"];
    $sql = "INSERT INTO files (Name, FilesName) VALUES ('$txtName', '$filesName')";
    $result = mysqli_query($mysqli, $sql);
    if (!$result) {
        die("Error inserting record: " . mysqli_error($mysqli));
    }

    // Close database connection
    mysqli_close($mysqli);
}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>
