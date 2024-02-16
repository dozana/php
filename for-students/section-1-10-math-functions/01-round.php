<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>round()</h1>

<?php

echo round(3.4)."<br>";         // 3
echo round(3.5)."<br>";         // 4
echo round(3.6)."<br>";         // 4
echo round(3.6, 0)."<br>";      // 4
echo round(1.95583, 2)."<br>";  // 1.96
echo round(1241757, -3)."<br>"; // 1242000
echo round(5.045, 2)."<br>";    // 5.05
echo round(5.055, 2)."<br>";    // 5.06

?>

</body>
</html>