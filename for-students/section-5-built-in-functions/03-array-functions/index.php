<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

  $numbers = [4,6,8,2,1,9,2];

  echo "max: ".max($numbers)."<br>";
  echo "<br>";

  echo "min: ".min($numbers)."<br>";
  echo print_r($numbers);
  echo "<hr>";

  echo "sort: ".sort($numbers)."<br>";
  echo print_r($numbers);
  echo "<hr>";

?>

</body>
</html>