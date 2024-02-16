<!DOCTYPE html>
<html>
<head>
<title>Delete multiple record</title>
<script>
function clickCheckAll(vol) {
    var checkboxes = document.querySelectorAll('input[name="chkDel[]"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = vol.checked;
    });
}

function onDelete() {
    return confirm('Do you want to delete?');
}
</script>
</head>
<body>
<form name="frmMain" action="phpMySQLDeleteMultiRecord.php" method="post" onSubmit="return onDelete();">
<?php
$objConnect = mysqli_connect("localhost", "root", "") or die("Error Connect to Database");
mysqli_select_db($objConnect, "test");
$strSQL = "SELECT * FROM customer";
$objQuery = mysqli_query($objConnect, $strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
    <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="clickCheckAll(this);">
    </div></th>
  </tr>
<?php
$i = 0;
while ($objResult = mysqli_fetch_array($objQuery)) {
    $i++;
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
    <td align="center"><input type="checkbox" name="chkDel[]" value="<?php echo $objResult["CustomerID"];?>"></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>
<input type="submit" name="btnDelete" value="Delete">
<input type="hidden" name="hdnCount" value="<?php echo $i;?>">
</form>
</body>
</html>
