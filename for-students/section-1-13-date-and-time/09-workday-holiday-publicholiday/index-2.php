<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Check Public Holiday from DB</h1>

<?php

function checkPublicHoliday($strChkDate, $conn) {
    $strSQL = "SELECT * FROM public_holiday WHERE PublicHoliday = '" . $strChkDate . "' ";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    return $row ? true : false;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$strStartDate = "2011-08-01";
$strEndDate = "2011-08-15";

$intWorkDay = 0;
$intHoliday = 0;
$intPublicHoliday = 0;
$intTotalDay = ((strtotime($strEndDate) - strtotime($strStartDate))/ (60 * 60 * 24)) + 1; 

while (strtotime($strStartDate) <= strtotime($strEndDate)) {
    $DayOfWeek = date("w", strtotime($strStartDate));
    if ($DayOfWeek == 0 || $DayOfWeek == 6) { // 0 = Sunday, 6 = Saturday;
        $intHoliday++;
        echo "$strStartDate = <font color=red>Holiday</font><br>";
    } elseif (checkPublicHoliday($strStartDate, $conn)) {
        $intPublicHoliday++;
        echo "$strStartDate = <font color=orange>Public Holiday</font><br>";
    } else {
        $intWorkDay++;
        echo "$strStartDate = <b>Work Day</b><br>";
    }
    $strStartDate = date ("Y-m-d", strtotime("+1 day", strtotime($strStartDate)));
}

echo "<hr>";
echo "<br>Total Day = $intTotalDay";
echo "<br>Work Day = $intWorkDay";
echo "<br>Holiday = $intHoliday";
echo "<br>Public Holiday = $intPublicHoliday";
echo "<br>All Holiday = " . ($intHoliday + $intPublicHoliday);

// Close connection
mysqli_close($conn);

?>

</body>
</html>