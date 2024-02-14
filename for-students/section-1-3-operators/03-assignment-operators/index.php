<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Assignment Operators</h1>

<?php
  $a = 4;
?>

<p><?php echo '$a = ' . $a . '<br>'; ?></p>

<table border="2" width="600">
  <thead>
    <tr>
      <th>Mark</th>
      <th>Meaning</th>
      <th>Type</th>
      <th>Result</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>=</td>
      <td>Assignment operator</td>
      <td><?php print('$a = 4'); ?></td>
      <td><?php echo $a; ?></td>
    </tr>
    <tr>
      <td>+=</td>
      <td>Addition assignment operator</td>
      <td><?php print('$a += 2'); ?></td>
      <td><?php echo $a += 2; ?></td>
    </tr>
    <tr>
      <td>-=</td>
      <td>Subtraction assignment operator</td>
      <td><?php print('$a -= 3'); ?></td>
      <td><?php echo $a -= 3; ?></td>
    </tr>
    <tr>
      <td>*=</td>
      <td>Multiplication assignment operator</td>
      <td><?php print('$a *= 5'); ?></td>
      <td><?php echo $a *= 5; ?></td>
    </tr>
    <tr>
      <td>/=</td>
      <td>Division assignment operator.</td>
      <td><?php print('$a /= 2'); ?></td>
      <td><?php echo $a /= 2; ?></td>
    </tr>
  </tbody>
</table>

<br>

<?php

  // Assigning the value of a numeric or string variable using assignment operators

  $x = 0;
  $x += 1; // the same as $x = $x + 1;
  $x--; // the same as $x = $x - 1;
  $x *= 3; // the same as $x = $x * 3;
  $x /= 2; // the same as $x = $x / 2;
  $x %= 4; // the same as $x = $x % 4;
  $x = "";
  $x .= 'A'; // append char to an existing string
  $x .= "BC"; // append string to an existing string

  echo "Result: $x";

?>

<hr>

<?php

// Using Variables as Names of Variables

$a = "var1";
$$a = 10.3;
echo "$a {${$a}} $$a <BR>\n";
echo "$var1 <br>\n";

echo "<hr>";

/*
  # dynamic function invocation

  Here, callFunc() is invoked with the string "foobar" as an argument.

  callFunc checks if "foobar" is a string, which is true.

  Then, it tries to call the function named "foobar" using $f(). Since "foobar" matches the name of the function defined earlier (function foobar()), it invokes foobar().

  Consequently, "foobar<br>\n" is echoed out, as defined in the foobar function.
*/

function foobar() {
  echo "foobar<br>\n";
}

function callFunc ($f) {
  if ( is_string($f) == true) {
    $f();
  }
}

callFunc("foobar");

echo "<hr>";

/*
  The above example might cause problems if $f is the name of a non-existent function. How to check is Using the function function_exists() as follows
*/

function MyFunc() {
  print ("ok..<BR>\n");
}

$f = "myFunc";

if(function_exists($f)) {
  $f();
} else {
  echo "$f does not exist!";
}
?>

</body>
</html>