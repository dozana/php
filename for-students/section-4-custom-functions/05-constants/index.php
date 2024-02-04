<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

$number = 10;
echo $number;

echo "<br>";

define("PI", 3.14);
echo PI;

echo "<br>";

const CONSTANT = "Hello World";
echo CONSTANT;

echo "<br>";

const ANIMALS = ["dog","cat","bird"];
echo ANIMALS[1];

echo "<br>";

define("HUMAN", [
  "john",
  "tom",
  "ann"
]);

echo HUMAN[2];


?>

</body>
</html>