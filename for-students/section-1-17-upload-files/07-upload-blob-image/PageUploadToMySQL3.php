<!DOCTYPE html>
<html>
<head>
    <title>upload blob image</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
// Database connection
$objConnect = mysqli_connect("localhost", "root", "", "test");
if (!$objConnect) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Query to select files from the database
$sql = "SELECT * FROM files";
$result = mysqli_query($objConnect, $sql);
if (!$result) {
    die("Error Query: " . mysqli_error($objConnect));
}
?>
<table width="340" border="1">
<tr>
<th width="50"> <div align="center">Files ID </div></th>
<th width="150"> <div align="center">Picture</div></th>
<th width="150"> <div align="center">Name</div></th>
<th width="150"> <div align="center">Edit</div></th>
</tr>
<?php
// Fetch and display files from the database
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><div align="center"><?php echo $row["FilesID"];?></div></td>
<td><center><img width="80" src="ViewImage.php?FilesID=<?php echo $row["FilesID"];?>"></center></td>
<td><center><?php echo $row["Name"];?></center></td>
<td><center><a href="PageUploadToMySQL4.php?FilesID=<?php echo $row["FilesID"];?>">Edit</a></center></td>
</tr>
<?php
}

// Close database connection
mysqli_close($objConnect);
?>
</table>
</body>
</html>
