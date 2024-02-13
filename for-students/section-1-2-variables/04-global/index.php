<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>global</h1>

<?php

/*
$a = 1;
$b = 2;

function sum() {
  $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

sum();
echo "b = $b";
*/

$a = 10;
$b = 20;

function getMin() {
  global $a, $b;

  if ($a < $b)
    return $b;
  else
    return $a;
}

function getMin2() {
  if($GLOBALS["a"] < $GLOBALS["b"])
    return $GLOBALS["a"];
  else
    return $GLOBALS["b"];
}

echo getMin()."<br>";
echo getMin2()."<br>";


function myFunc() {
  static $numFuncCalls = 0;
  echo "My Function \n";
  ++$numFuncCalls;
}

echo myFunc();
echo "<br><br>";


function fooBar() {
  return ['foo', 'bar', 0xff];
}

list($foo, $bar, $num) = fooBar();
echo "Result: $foo $bar $num <br>";

?>

</body>
</html>