<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>while</h1>

<?php

$i = 1;

while ($i <= 6) {
  echo "<h$i>Hello World</h$i>";
  $i++;
}

?>

<h1>Reverse logic</h1>

<?php

$j = 6;

while ($j >= 1) {
  echo "<h$j>Hello World</h$j>";
  $j--;
}

?>

</body>
</html>