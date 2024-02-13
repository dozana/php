<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>gettype</h1>

<?php

$person = "John Doe";   // string
$age = 1234;            // integer
$salary = 1580.78;      // float
$interests = ['reading', 'swimming']; // array
$isProgrammer = true;   // boolean

echo "$person - ".gettype($person) . "<br>";
echo "$age - ".gettype($age) . "<br>";
echo "$salary - ".gettype($salary) . "<br>";
echo print_r($interests, true) . " - ".gettype($interests) . "<br>";
echo "$isProgrammer - ".gettype($isProgrammer) . "<br>";

?>

</body>
</html>