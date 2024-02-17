<!DOCTYPE html>
<html>
<head>
<title>Upload file to MySQL</title>
</head>
<body>
<?php
if(isset($_FILES["filUpload"])) {
    // Define upload directory
    $uploadDirectory = "myfile/";

    // Move uploaded file to destination directory
    $uploadFilePath = $uploadDirectory . basename($_FILES["filUpload"]["name"]);
    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"], $uploadFilePath)) {
        echo "Copy/Upload Complete<br>";

        // Database connection
        $mysqli = mysqli_connect("localhost", "root", "", "test");
        if(mysqli_connect_errno()) {
            die("Error Connect to Database: " . mysqli_connect_error());
        }

        // Escape filename to prevent SQL injection
        $fileName = mysqli_real_escape_string($mysqli, $_FILES["filUpload"]["name"]);

        // Insert record into database
        $sql = "INSERT INTO files (FilesName) VALUES ('$fileName')";
        if(mysqli_query($mysqli, $sql)) {
            echo "Record inserted<br>";
        } else {
            echo "Error inserting record: " . mysqli_error($mysqli) . "<br>";
        }

        // Close database connection
        mysqli_close($mysqli);
    } else {
        echo "Failed to copy/upload file<br>";
    }
}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>
