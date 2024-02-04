<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

$numbers = array();
$numbers = [2,5,6,7,8,1,0,"Two","%",9,12,"<h1>Hi there</h1>"];

print_r($numbers);

echo "<hr>";

$firstElement = $numbers[0];
echo "First element: $firstElement";

?>

</body>
</html>