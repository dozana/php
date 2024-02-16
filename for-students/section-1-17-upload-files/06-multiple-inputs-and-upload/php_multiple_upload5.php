<!DOCTYPE html>
<html>
<head>
    <title>Multiple upload</title>
</head>
<body>
<?php
// Database connection
$mysqli = mysqli_connect("localhost", "root", "", "test");
if (!$mysqli) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Check if the form is submitted and the hidden input "hdnLine" exists
if (isset($_POST["hdnLine"])) {
    $numInputs = (int)$_POST["hdnLine"];

    // Loop through each uploaded file
    for ($i = 1; $i <= $numInputs; $i++) {
        if ($_FILES["fileUpload$i"]["name"] != "") {
            // Define the upload directory and move the uploaded file
            $uploadDirectory = "myfile/";
            $uploadFilePath = $uploadDirectory . $_FILES["fileUpload$i"]["name"];
            if (move_uploaded_file($_FILES["fileUpload$i"]["tmp_name"], $uploadFilePath)) {
                // Insert the file details into the database
                $galleryName = mysqli_real_escape_string($mysqli, $_POST["txtGalleryName$i"]);
                $fileName = mysqli_real_escape_string($mysqli, $_FILES["fileUpload$i"]["name"]);
                $sql = "INSERT INTO gallery (GalleryName, Picture) VALUES ('$galleryName', '$fileName')";
                if (mysqli_query($mysqli, $sql)) {
                    echo "Copy/Upload $fileName completed.<br>";
                } else {
                    echo "Error inserting file details: " . mysqli_error($mysqli) . "<br>";
                }
            } else {
                echo "Failed to copy/upload file " . $_FILES["fileUpload$i"]["name"] . "<br>";
            }
        }
    }
} else {
    echo "No input data received.";
}

// Close database connection
mysqli_close($mysqli);

// Provide a link to view files
echo "<br><a href='php_multiple_upload6.php'>View files</a>";
?>
</body>
</html>
