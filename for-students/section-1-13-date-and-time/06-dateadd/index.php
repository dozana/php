<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>DateAdd</h1>

<?php

echo date('Y-m-d',strtotime('+1 month'))."<br>";
echo date('Y-m-d',strtotime("now"))."<br>";
echo date('Y-m-d',strtotime("10 September 2000"))."<br>";
echo date('Y-m-d',strtotime("+1 day"))."<br>";
echo date('Y-m-d',strtotime("+1 week"))."<br>";
echo date('Y-m-d',strtotime("+1 week 2 days 4 hours 2 seconds"))."<br>";
echo date('Y-m-d',strtotime("next Thursday"))."<br>";
echo date('Y-m-d',strtotime("last Monday"))."<br>";
echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0))."<br>";

echo "<br>";

$strStartDate = "2013-04-21";
$strNewDate = date ("Y-m-d", strtotime("+3 day", strtotime($strStartDate)));
echo $strNewDate;

?>

</body>
</html>