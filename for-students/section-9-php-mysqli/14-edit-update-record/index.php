<!DOCTYPE html>
<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect, "test");
$strSQL = "SELECT * FROM customer";
$objQuery = mysqli_query($objConnect, $strSQL) or die("Error Query [" . $strSQL . "]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
    <th width="30"> <div align="center">Edit </div></th>
  </tr>
<?php
while ($objResult = mysqli_fetch_array($objQuery)) {
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
    <td align="center"><a href="form.php?CusID=<?php echo $objResult["CustomerID"];?>">Edit</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>
</body>
</html>
