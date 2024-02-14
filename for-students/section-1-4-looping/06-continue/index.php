<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>continue</h1>

<?php

for ($i = 1; $i <= 6; $i++) {
  if ($i == 4) {
    continue;
  }
  echo "<h$i>$i - Hello World</h$i>";
}

?>

</body>
</html>