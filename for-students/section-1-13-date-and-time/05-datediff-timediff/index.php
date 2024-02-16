<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>DateDiff / TimeDiff</h1>

<?php

function DateDiff($strDate1,$strDate2) {
  return (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24 );
  // 1 day = 60*60*24
}
function TimeDiff($strTime1,$strTime2) {
  return (strtotime($strTime2) - strtotime($strTime1)) / ( 60 * 60 );
  // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1,$strDateTime2) {
  return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 );
  // 1 Hour =  60*60
}

echo "Date Diff = ".DateDiff("2024-02-16","2010-08-31")."<br>";
echo "Time Diff = ".TimeDiff("00:00","19:00")."<br>";
echo "Date Time Diff = ".DateTimeDiff("2008-08-01 00:00","2008-08-01 19:00")."<br>";

?>

</body>
</html>