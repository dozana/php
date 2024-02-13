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

// Retrieve file information based on FilesID from the database
$FilesID = isset($_GET["FilesID"]) ? $_GET["FilesID"] : "";
$sql = "SELECT * FROM files WHERE FilesID = '$FilesID'";
$result = mysqli_query($objConnect, $sql);
if (!$result) {
    die("Error Query: " . mysqli_error($objConnect));
}
$objResult = mysqli_fetch_array($result);
?>
<form name="form1" method="post" action="PageUploadToMySQL5.php?FilesID=<?php echo $FilesID;?>" enctype="multipart/form-data">
    Edit Picture :<br>
    Name : <input type="text" name="txtName" value="<?php echo $objResult["Name"];?>"><br>
    <img width="80" src="ViewImage.php?FilesID=<?php echo $objResult["FilesID"];?>"><br>
    Picture : <input type="file" name="filUpload"><br>
    <input name="btnSubmit" type="submit" value="Submit">
</form>
<?php
// Close database connection
mysqli_close($objConnect);
?>
</body>
</html>
