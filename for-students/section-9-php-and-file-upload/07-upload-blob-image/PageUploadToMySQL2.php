<!DOCTYPE html>
<html>
<head>
    <title>upload blob image</title>
</head>
<body>
<?php
if($_FILES["filUpload"]["name"] != "") {
    
    // Read file BINARY
    $fp = fopen($_FILES["filUpload"]["tmp_name"], "r");
    $ReadBinary = fread($fp, filesize($_FILES["filUpload"]["tmp_name"]));
    fclose($fp);
    $FileData = addslashes($ReadBinary);

    // Database connection
    $objConnect = mysqli_connect("localhost", "root", "", "test");
    if (!$objConnect) {
        die("Error Connect to Database: " . mysqli_connect_error());
    }

    // Insert Record
    $strSQL = "INSERT INTO files (Name, FilesName) VALUES ('" . $_POST["txtName"] . "', '" . $FileData . "')";
    $objQuery = mysqli_query($objConnect, $strSQL);
    if ($objQuery) {
        echo "Copy/Upload Complete<br>";
    } else {
        echo "Error: " . mysqli_error($objConnect);
    }

    // Close database connection
    mysqli_close($objConnect);
}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>
</html>
