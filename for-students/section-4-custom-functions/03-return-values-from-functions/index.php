<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

function message($text) {
  return $text . "<br>";
}

echo message("Hi there");
echo message("How are you ?");

function calculate($number1, $number2) {
  $sum = $number1 + $number2 . "<br>";
  return $sum;
}

echo calculate(2, 3);
echo calculate(4, 6);
echo calculate(1, 7);

?>

</body>
</html>