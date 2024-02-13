<!DOCTYPE html>
<html>
  <head>
    <title>Database Class</title>
  </head>
<body>
<?php
include("functions.php");

// New class database
$strHost = "localhost";
$strDB = "test";
$strUser = "root";
$strPassword = "";
$clsMyDB = new MyDatabase($strHost, $strDB, $strUser, $strPassword);

// Call to class function insert record
$strTable = "customer";
$strField = "CustomerID,Name,Email,CountryCode,Budget,Used";
$strValue = "'C005','Weerachai Nukitram','webmaster@thaicreate.com','TH','2000000','0'";
$objInsert = $clsMyDB->fncInsertRecord($strTable, $strField, $strValue);
if (!$objInsert) {
    echo "Record already exists.<br>";
} else {
    echo "Record inserted.<br>";
}

echo "<br>===========================<br>";

// Call to function select record
$strTable = "customer";
$strCondition = "CustomerID = 'C005'";
$objSelect = $clsMyDB->fncSelectRecord($strTable, $strCondition);
if (!$objSelect) {
    echo "Record not found<br>";
} else {
    echo "Customer Detail.<br>";
    echo "CustomerID = " . $objSelect['CustomerID'] . "<br>";
    echo "Name = " . $objSelect['Name'] . "<br>";
    echo "Email = " . $objSelect['Email'] . "<br>";
    echo "CountryCode = " . $objSelect['CountryCode'] . "<br>";
    echo "Budget = " . $objSelect['Budget'] . "<br>";
    echo "Used = " . $objSelect['Used'] . "<br>";
}

echo "<br>===========================<br>";

// Call to function update record (argument)
$strTable = "customer";
$strCommand = "Budget = '4000000'";
$strCondition = "CustomerID = 'C005'";
$objUpdate = $clsMyDB->fncUpdateRecord($strTable, $strCommand, $strCondition);
if (!$objUpdate) {
    echo "Error updating record.<br>";
} else {
    echo "Record updated.<br>";
}

echo "<br>===========================<br>";

// Call to function delete record
$strTable = "customer";
$strCondition = "CustomerID = 'C005'";
$objDelete = $clsMyDB->fncDeleteRecord($strTable, $strCondition);
if (!$objDelete) {
    echo "Record not deleted.<br>";
} else {
    echo "Record deleted.<br>";
}
?>
</body>
</html>
