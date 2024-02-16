<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>
<?php
$objConnect = mysqli_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");

// Start Transaction
mysqli_autocommit($objConnect, false);

// Query 1
$strSQL1 = "INSERT INTO customer ";
$strSQL1 .= "(CustomerID,Name,Email,CountryCode,Budget,Used) ";
$strSQL1 .= "VALUES ";
$strSQL1 .= "('".$_POST["txtCustomerID"]."','".$_POST["txtName"]."','".$_POST["txtEmail"]."' ";
$strSQL1 .= ",'".$_POST["txtCountryCode"]."','".$_POST["txtBudget"]."','".$_POST["txtUsed"]."') ";
$objQuery1 = mysqli_query($objConnect, $strSQL1);

// Query 2
$strSQL2 = "INSERT INTO customer ";
$strSQL2 .= "(CustomerID,Name,Email,CountryCode,Budget,Used) ";
$strSQL2 .= "VALUES ";
$strSQL2 .= "('".$_POST["txtCustomerID"]."','".$_POST["txtName"]."','".$_POST["txtEmail"]."' ";
$strSQL2 .= ",'".$_POST["txtCountryCode"]."','".$_POST["txtBudget"]."','".$_POST["txtUsed"]."') ";
$objQuery2 = mysqli_query($objConnect, $strSQL2);

if($objQuery1 && $objQuery2) {
    // Commit Transaction
    mysqli_commit($objConnect);
    echo "Save Done.";
} else {
    // RollBack Transaction
    mysqli_rollback($objConnect);
    echo "Error Save [".$strSQL."]";
}

mysqli_close($objConnect);
?>
</body>
</html>
