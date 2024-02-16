<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
// Database connection
$mysqli = mysqli_connect("localhost", "root", "", "test");
if (!$mysqli) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

// Query to get total number of records
$sqlTotalRecords = "SELECT COUNT(*) AS total FROM gallery";
$resultTotalRecords = mysqli_query($mysqli, $sqlTotalRecords);
if (!$resultTotalRecords) {
    die("Error retrieving total records: " . mysqli_error($mysqli));
}
$rowTotalRecords = mysqli_fetch_assoc($resultTotalRecords);
$Num_Rows = $rowTotalRecords['total'];

$Per_Page = 4; // Per Page

$Page = isset($_GET["Page"]) ? $_GET["Page"] : 1;
$Prev_Page = $Page - 1;
$Next_Page = $Page + 1;

$Page_Start = (($Per_Page * $Page) - $Per_Page);

// Query to retrieve records with pagination
$sql = "SELECT * FROM gallery ORDER BY GalleryID ASC LIMIT $Page_Start, $Per_Page";
$result = mysqli_query($mysqli, $sql);
if (!$result) {
    die("Error executing query: " . mysqli_error($mysqli));
}

echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows = 0;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<td>";
    $intRows++;
?>
    <center>
        <img src="thaicreate/<?php echo $row["Picture"]; ?>"><br>
        <?php echo $row["GalleryName"]; ?>
        <br>
    </center>
<?php
    echo "</td>";
    if (($intRows) % 2 == 0) {
        echo "</tr>";
    }
}
echo "</tr></table>";

// Pagination links
echo "<br>";
echo "Total $Num_Rows Record : ";

if ($Prev_Page) {
    echo "<a href='{$_SERVER['SCRIPT_NAME']}?Page=$Prev_Page'>&lt;&lt; Back</a> ";
}

for ($i = 1; $i <= ceil($Num_Rows / $Per_Page); $i++) {
    if ($i != $Page) {
        echo "[ <a href='{$_SERVER['SCRIPT_NAME']}?Page=$i'>$i</a> ]";
    } else {
        echo "<b> $i </b>";
    }
}

if ($Page != ceil($Num_Rows / $Per_Page)) {
    echo " <a href='{$_SERVER['SCRIPT_NAME']}?Page=$Next_Page'>Next &gt;&gt;</a> ";
}
?>
</body>
</html>
<?php
// Close database connection
mysqli_close($mysqli);
?>
