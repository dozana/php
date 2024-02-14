<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Arithmetic Operators</h1>

<?php

$a = 10;
$b = 7;

$addition = $a + $b;
$subtraction = $a - $b;
$multiplication = $a * $b;
$division = $a / $b;
$modulo = $a % $b;

?>

<p><?php echo '$a = ' . $a . '<br>' . '$b = ' . $b; ?></p>

<table border="2" width="400">
  <thead>
    <tr>
      <th>Operation</th>
      <th>Example</th>
      <th>Result</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Addition</td>
      <td>$a + $b</td>
      <td><?php echo $addition; ?></td>
    </tr>
    <tr>
      <td>Subtraction</td>
      <td>$a - $b</td>
      <td><?php echo $subtraction; ?></td>
    </tr>
    <tr>
      <td>Multiplication</td>
      <td>$a * $b</td>
      <td><?php echo $multiplication; ?></td>
    </tr>
    <tr>
      <td>Division</td>
      <td>$a / $b</td>
      <td><?php echo $division; ?></td>
    </tr>
    <tr>
      <td>Modulo</td>
      <td>$a % $b</td>
      <td><?php echo $modulo; ?></td>
    </tr>
  </tbody>
</table>

</body>
</html>