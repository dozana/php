<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>getdate()</h1>

<?php

$today = getdate();

echo "Day = ".$today["mday"]."<br>";
echo "Month = ".$today["mon"]."<br>";
echo "Year = ".$today["year"]."<br>";
echo "<hr>";

foreach($today as $key => $value) {
  echo "Key: $key; Value: $value<br>";
}

?>

</body>
</html>