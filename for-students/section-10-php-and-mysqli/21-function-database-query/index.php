<!DOCTYPE html>
<html>
<head>
<title>Function database query</title>
</head>
<body>
<?php
include("functions.php");

// Database connection parameters
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test";

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//**** Call to function insert record ****//
$strTable = "customer";
$strField = "CustomerID,Name,Email,CountryCode,Budget,Used";
$strValue = "'C005','Weerachai Nukitram','webmaster@thaicreate.com','TH','2000000','0'";
$objInsert = fncInsertRecord($conn, $strTable, $strField, $strValue);
if(!$objInsert) {
    echo "Record already exists.<br>";
} else {
    echo "Record inserted.<br>";
}

echo "<br>===========================<br>";

//**** Call to function select record ****//
$strTable = "customer";
$strCondition = "CustomerID = 'C005'";
$objSelect = fncSelectRecord($conn, $strTable, $strCondition);
if(!$objSelect) {
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

//**** Call to function update record ****//
$strTable = "customer";
$strCommand = "Budget = '4000000'";
$strCondition = "CustomerID = 'C005'";
$objUpdate = fncUpdateRecord($conn, $strTable, $strCommand, $strCondition);
if(!$objUpdate) {
    echo "Error updating record.<br>";
} else {
    echo "Record updated.<br>";
}

echo "<br>===========================<br>";

//**** Call to function delete record ****//
$strTable = "customer";
$strCondition = "CustomerID = 'C005'";
$objDelete = fncDeleteRecord($conn, $strTable, $strCondition);
if(!$objDelete) {
    echo "Record not deleted<br>";
} else {
    echo "Record deleted.<br>";
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
