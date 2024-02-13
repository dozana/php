<!DOCTYPE html>
<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");
$strSQL = "UPDATE customer SET ";
$strSQL .= "CustomerID = '" . mysqli_real_escape_string($objConnect, $_POST["txtCustomerID"]) . "' ";
$strSQL .= ",Name = '" . mysqli_real_escape_string($objConnect, $_POST["txtName"]) . "' ";
$strSQL .= ",Email = '" . mysqli_real_escape_string($objConnect, $_POST["txtEmail"]) . "' ";
$strSQL .= ",CountryCode = '" . mysqli_real_escape_string($objConnect, $_POST["txtCountryCode"]) . "' ";
$strSQL .= ",Budget = '" . mysqli_real_escape_string($objConnect, $_POST["txtBudget"]) . "' ";
$strSQL .= ",Used = '" . mysqli_real_escape_string($objConnect, $_POST["txtUsed"]) . "' ";
$strSQL .= "WHERE CustomerID = '" . mysqli_real_escape_string($objConnect, $_GET["CusID"]) . "' ";
$objQuery = mysqli_query($objConnect, $strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [" . htmlspecialchars($strSQL, ENT_QUOTES, 'UTF-8') . "]";
}
mysqli_close($objConnect);
?>
</body>
</html>
