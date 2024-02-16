<!DOCTYPE html>
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

// Query to select file information based on FilesID
$sql = "SELECT * FROM files WHERE FilesID = '$FilesID'";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
    die("Error Query: " . mysqli_error($mysqli));
}
$objResult = mysqli_fetch_assoc($result);
?>
<form name="form1" method="post" action="PageUploadToMySQL5.php?FilesID=<?php echo $FilesID; ?>" enctype="multipart/form-data">
    Edit Picture :<br>
    Name : <input type="text" name="txtName" value="<?php echo $objResult["Name"]; ?>"><br>
    <img src="myfile/<?php echo $objResult["FilesName"]; ?>"><br>
    Picture : <input type="file" name="filUpload"><br>
    <input type="hidden" name="hdnOldFile" value="<?php echo $objResult["FilesName"]; ?>">
    <input name="btnSubmit" type="submit" value="Submit">
</form>
<?php
// Close database connection
mysqli_close($mysqli);
?>
</body>
</html>
