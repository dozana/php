<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

/*
  COMPARISON OPERATORS

  =   equal
  !=  not equal

  === identical
  !== not identical

  > < >= <= <>  Compare


  LOGICAL OPERATORS

    and &&
    or  ||
    not !

*/

// Comparison Operators
$a = 5;
$b = 10;

// Equality
if ($a == $b) {
    echo "$a is equal to $b"."<br>";
} else {
    echo "$a is not equal to $b"."<br>";
}

// Inequality
if ($a != $b) {
    echo "$a is not equal to $b"."<br>";
} else {
    echo "$a is equal to $b"."<br>";
}

// Greater Than
if ($a > $b) {
    echo "$a is greater than $b"."<br>";
} else {
    echo "$a is not greater than $b"."<br>";
}

// Logical Operators
$x = true;
$y = false;

// Logical AND
if ($x && $y) {
    echo "Both x and y are true"."<br>";
} else {
    echo "Either x or y is false"."<br>";
}

// Logical OR
if ($x || $y) {
    echo "Either x or y is true"."<br>";
} else {
    echo "Both x and y are false"."<br>";
}

// Logical NOT
if (!$x) {
    echo "x is false"."<br>";
} else {
    echo "x is true"."<br>";
}

?>

</body>
</html>