<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>printf</h1>

<?php

printf("2 * 2 = %d", 100 * 2); // 200
echo "<br>";

printf("2 * 2 = %b", 100 * 2); // 11001000
echo "<br>";

printf("2 * 2 = %o", 100 * 2); // 310
echo "<br>";

printf("2 * 2 = %x", 100 * 2); // c8
echo "<br>";

printf("%s", "This is temp text"); // This is temp text
echo "<br>";

printf("2 * 2 = %.2f", 100 * 2); // 200.00
echo "<br>";

printf("2 * 2 = %c", 100 * 2); // � ASCII
echo "<br>";

?>

</body>
</html>