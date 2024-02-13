<!DOCTYPE html>
<html>
<head>
<title>Delete multiple record</title>
</head>
<body>
<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");

for ($i = 0; $i < count($_POST["chkDel"]); $i++) {
    if ($_POST["chkDel"][$i] != "") {
        $strSQL = "DELETE FROM customer ";
        $strSQL .= "WHERE CustomerID = '" . $_POST["chkDel"][$i] . "' ";
        $objQuery = mysqli_query($objConnect, $strSQL);
    }
}

echo "Record Deleted.";

mysqli_close($objConnect);
?>
</body>
</html>
