<!DOCTYPE html>
<html>
<head>
    <title>Multiple upload file</title>
</head>
<body>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "test");
if (!$mysqli) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

for ($i = 0; $i < count($_FILES["filUpload"]["name"]); $i++) {
    if ($_FILES["filUpload"]["name"][$i] != "") {
        if (move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i], "myfile/" . $_FILES["filUpload"]["name"][$i])) {
            // Insert Record
            $fileName = mysqli_real_escape_string($mysqli, $_FILES["filUpload"]["name"][$i]);
            $sql = "INSERT INTO files (Name, FilesName) VALUES ('Placeholder', '$fileName')";
            $result = mysqli_query($mysqli, $sql);
            if (!$result) {
                die("Error inserting file: " . mysqli_error($mysqli));
            }
        }
    }
}

echo "Copy/Upload Complete<br>";

mysqli_close($mysqli);
?>
<a href="PageMultiUploadToMySQL3.php">View files</a>
</body>
</html>
