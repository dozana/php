<!DOCTYPE html>
<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<form action="save.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");
$strSQL = "SELECT * FROM customer WHERE CustomerID = '" . mysqli_real_escape_string($objConnect, $_GET["CusID"]) . "' ";
$objQuery = mysqli_query($objConnect, $strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult) {
  echo "Not found CustomerID=" . htmlspecialchars($_GET["CusID"], ENT_QUOTES, 'UTF-8');
} else {
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="160"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="70"> <div align="center">Budget </div></th>
    <th width="70"> <div align="center">Used </div></th>
  </tr>
  <tr>
    <td><div align="center"><input type="text" name="txtCustomerID" size="5" value="<?php echo htmlspecialchars($objResult["CustomerID"], ENT_QUOTES, 'UTF-8');?>"></div></td>
    <td><input type="text" name="txtName" size="20" value="<?php echo htmlspecialchars($objResult["Name"], ENT_QUOTES, 'UTF-8');?>"></td>
    <td><input type="text" name="txtEmail" size="20" value="<?php echo htmlspecialchars($objResult["Email"], ENT_QUOTES, 'UTF-8');?>"></td>
    <td><div align="center"><input type="text" name="txtCountryCode" size="2" value="<?php echo htmlspecialchars($objResult["CountryCode"], ENT_QUOTES, 'UTF-8');?>"></div></td>
    <td align="right"><input type="text" name="txtBudget" size="5" value="<?php echo htmlspecialchars($objResult["Budget"], ENT_QUOTES, 'UTF-8');?>"></td>
    <td align="right"><input type="text" name="txtUsed" size="5" value="<?php echo htmlspecialchars($objResult["Used"], ENT_QUOTES, 'UTF-8');?>"></td>
  </tr>
</table>
<input type="submit" name="submit" value="Submit">
<?php
}
mysqli_close($objConnect);
?>
</form>
</body>
</html>
