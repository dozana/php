<!DOCTYPE html>
<html>
<head>
<title>Upload file to MySQL</title>
</head>
<body>
<?php
// Database connection
$mysqli = mysqli_connect("localhost", "root", "", "test");
if(mysqli_connect_errno()) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Query to select files from the database
$sql = "SELECT * FROM files";
$result = mysqli_query($mysqli, $sql);
if(!$result) {
    die("Error Query: " . mysqli_error($mysqli));
}
?>
<table width="200" border="1">
<tr>
<th width="50"> <div align="center">Files ID </div></th>
<th width="150"> <div align="center">Files Name </div></th>
</tr>
<?php
// Fetch and display files from the database
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><div align="center"><?php echo $row["FilesID"];?></div></td>
<td><center><a href="myfile/<?php echo $row["FilesName"];?>"><?php echo $row["FilesName"];?></a></center></td>
</tr>
<?php
}

// Close database connection
mysqli_close($mysqli);
?>
</table>
</body>
</html>
