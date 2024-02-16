<!DOCTYPE html>
<html>
    <head>
        <title>Delete Record</title>
    </head>
<body>

<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");
$CusID = isset($_GET["CusID"]) ? $_GET["CusID"] : '';

if (!empty($CusID)) {
    $strSQL = "DELETE FROM customer WHERE CustomerID = '" . mysqli_real_escape_string($objConnect, $CusID) . "'";
    $objQuery = mysqli_query($objConnect, $strSQL);

    if($objQuery) {
        echo "Record Deleted.";
    } else {
        echo "Error Delete [" . $strSQL . "]";
    }
} else {
    echo "Invalid Customer ID.";
}

mysqli_close($objConnect);
?>

</body>
</html>
