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

// Query to select records from the gallery table
$sql = "SELECT * FROM gallery";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
    die("Error Query: " . mysqli_error($mysqli));
}

// Display records in a table
echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows = 0;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<td>";
    $intRows++;
?>
    <center>
        <img width="150" src="myfile/<?php echo $row["Picture"]; ?>"><br>
        <?php echo $row["GalleryName"]; ?><br>
    </center>
<?php
    echo "</td>";
    if (($intRows) % 2 == 0) {
        echo "</tr>";
    }
}
echo "</tr></table>";

// Close database connection
mysqli_close($mysqli);
?>
</body>
</html>
