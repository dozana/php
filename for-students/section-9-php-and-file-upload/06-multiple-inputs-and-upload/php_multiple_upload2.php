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

// Loop through each uploaded file
for ($i = 1; $i <= (int)$_POST["hdnLine"]; $i++) {
    if ($_FILES["fileUpload".$i]["name"] != "") {
        if (move_uploaded_file($_FILES["fileUpload".$i]["tmp_name"], "myfile/".$_FILES["fileUpload".$i]["name"])) {
            // Insert record into the database
            $galleryName = $_POST["txtGalleryName".$i];
            $picture = $_FILES["fileUpload".$i]["name"];
            $sql = "INSERT INTO gallery (GalleryName, Picture) VALUES ('$galleryName', '$picture')";
            $result = mysqli_query($mysqli, $sql);
            if (!$result) {
                die("Error inserting record: " . mysqli_error($mysqli));
            }

            echo "Copy/Upload ".$_FILES["fileUpload".$i]["name"]." completed.<br>";
        }
    }
}

echo "<br><a href='php_multiple_upload3.php'>View file</a>";

// Close database connection
mysqli_close($mysqli);
?>
</body>
</html>
