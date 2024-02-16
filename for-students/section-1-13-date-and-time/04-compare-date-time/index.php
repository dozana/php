<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Compare Date/Time</h1>

<?php

function compareDate($date1, $date2) {
  $arrDate1 = explode("-",$date1);
  $arrDate2 = explode("-",$date2);
  $timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]);
  $timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[2],$arrDate2[0]);

  if ($timStmp1 == $timStmp2) {
    echo "\$date = \$date2";
  } else if ($timStmp1 > $timStmp2) {
    echo "\$date > \$date2";
  } else if ($timStmp1 < $timStmp2) {
    echo "\$date < \$date2";
  }
}
echo compareDate("2024-02-16","2010-08-05");

?>

</body>
</html>