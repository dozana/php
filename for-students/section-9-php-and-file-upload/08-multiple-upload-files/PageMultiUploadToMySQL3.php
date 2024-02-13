<html>
<head>
<title>Multiple upload file</title>
</head>
<body>
<?php
    // Establish a connection to the database
    $objConnect = mysqli_connect("localhost", "root", "", "test");
    if (!$objConnect) {
        die("Error Connect to Database: " . mysqli_connect_error());
    }

    // Retrieve image data from the database
    $strSQL = "SELECT * FROM files";
    $objQuery = mysqli_query($objConnect, $strSQL);
    if (!$objQuery) {
        die("Error Query [" . $strSQL . "]");
    }

    // Output images in a table format
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"1\"><tr>";
    $intRows = 0;
    while ($objResult = mysqli_fetch_array($objQuery)) {
        $intRows++;
        echo "<td>";
?>
        <table width="91" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div align="center">
                        <!-- Check if image data exists before encoding -->
                        <?php if (!empty($objResult['FilesBlob'])): ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($objResult['FilesBlob']); ?>" width="100" height="100" border="0">
                        <?php else: ?>
                            <p>No image available</p>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
<?php
        echo "</td>";
        if ($intRows % 2 == 0) {
            echo "</tr>";
        } else {
            echo "<td>";
        }
    }
    echo "</tr></table>";

    // Close the database connection
    mysqli_close($objConnect);
?>
</body>
</html>
