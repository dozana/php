<!DOCTYPE html>
<html>
  <head>
    <title>Edit multiple records</title>
  </head>
<body>

<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");

// Update Condition
if(isset($_GET["Action"]) && $_GET["Action"] == "Save")
{
    for($i = 1; $i <= $_POST["hdnLine"]; $i++)
    {
        $strSQL = "UPDATE customer SET ";
        $strSQL .= "CustomerID = '" . mysqli_real_escape_string($objConnect, $_POST["txtCustomerID$i"]) . "' ";
        $strSQL .= ",Name = '" . mysqli_real_escape_string($objConnect, $_POST["txtName$i"]) . "' ";
        $strSQL .= ",Email = '" . mysqli_real_escape_string($objConnect, $_POST["txtEmail$i"]) . "' ";
        $strSQL .= ",CountryCode = '" . mysqli_real_escape_string($objConnect, $_POST["txtCountryCode$i"]) . "' ";
        $strSQL .= ",Budget = '" . mysqli_real_escape_string($objConnect, $_POST["txtBudget$i"]) . "' ";
        $strSQL .= ",Used = '" . mysqli_real_escape_string($objConnect, $_POST["txtUsed$i"]) . "' ";
        $strSQL .= "WHERE CustomerID = '" . mysqli_real_escape_string($objConnect, $_POST["hdnCustomerID$i"]) . "' ";
        $objQuery = mysqli_query($objConnect, $strSQL);
    }
}

$strSQL = "SELECT * FROM customer ORDER BY CustomerID ASC";
$objQuery = mysqli_query($objConnect, $strSQL) or die("Error Query [" . $strSQL . "]");
?>
<form name="frmMain" method="post" action="action.php?Action=Save">
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?php
$i = 0;
while($objResult = mysqli_fetch_array($objQuery))
{
    $i++;
?>
  <tr>
    <td><div align="center">
    <input type="hidden" name="hdnCustomerID<?php echo $i; ?>" size="5" value="<?php echo $objResult["CustomerID"]; ?>">
    <input type="text" name="txtCustomerID<?php echo $i; ?>" size="5" value="<?php echo $objResult["CustomerID"]; ?>">
    </div></td>
    <td><input type="text" name="txtName<?php echo $i; ?>" size="20" value="<?php echo $objResult["Name"]; ?>"></td>
    <td><input type="text" name="txtEmail<?php echo $i; ?>" size="20" value="<?php echo $objResult["Email"]; ?>"></td>
    <td><div align="center"><input type="text" name="txtCountryCode<?php echo $i; ?>" size="2" value="<?php echo $objResult["CountryCode"]; ?>"></div></td>
    <td align="right"><input type="text" name="txtBudget<?php echo $i; ?>" size="5" value="<?php echo $objResult["Budget"]; ?>"></td>
    <td align="right"><input type="text" name="txtUsed<?php echo $i; ?>" size="5" value="<?php echo $objResult["Used"]; ?>"></td>
  </tr>
<?php
}
?>
</table>
<input type="submit" name="submit" value="submit">
<input type="hidden" name="hdnLine" value="<?php echo $i; ?>">
</form>
<?php
mysqli_close($objConnect);
?>

</body>
</html>
