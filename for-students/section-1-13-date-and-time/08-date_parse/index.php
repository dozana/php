<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>date_parse()</h1>

<?php

  $strDate = date_parse("2024-02-16 10:50:45");

  // Accessing individual elements
  echo "Year: " . $strDate["year"] . "<br>";
  echo "Month: " . $strDate["month"] . "<br>";
  echo "Day: " . $strDate["day"] . "<br>";
  echo "<hr>";

  // Looping through all elements
  foreach($strDate as $key => $value) {
      if (!is_array($value)) {
          echo "Key: [$key] Value= $value<br>";
      } else {
          echo "Key: [$key] Value= ";
          print_r($value);
          echo "<br>";
      }
  }

?>

</body>
</html>