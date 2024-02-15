<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>switch</h1>

<?php

  $i = 2;
  if($i == 0) {
    echo "i number = 0"."<br>";
  } elseif ($i == 1) {
    echo "i number = 1"."<br>";
  } elseif ($i == 2) {
    echo "i number = 2"."<br>";
  }
  echo "<hr>";

  $i = 0;
  switch ($i) {
    case 0:
      echo "i number = 0"."<br>";
      break;
    case 1:
      echo "i number = 1"."<br>";
      break;
    case 2:
      echo "i number = 2"."<br>";
      break;
  }

?>

</body>
</html>