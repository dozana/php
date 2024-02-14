<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Comparison Operators</h1>

<p>
  <?php 
    $a = 5;
    $b = 8;
    $c = 4;

    echo '$a = ' . $a . '<br>'; 
    echo '$b = ' . $b . '<br>'; 
    echo '$c = ' . $c . '<br>';
  ?>
</p>

<table border="2" width="600">
  <thead>
    <tr>
      <th>Mark</th>
      <th>Meaning</th>
      <th>Result</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>$a == $b</td>
      <td>equal to</td>
      <td><?php echo $a == $b; ?></td>
    </tr>
    <tr>
      <td>$a != $b</td>
      <td>not equal to</td>
      <td><?php echo $a != $b; ?></td>
    </tr>
    <tr>
      <td>$a < $b</td>
      <td>less</td>
      <td><?php echo $a < $b; ?></td>
    </tr>
    <tr>
      <td>$a > $b</td>
      <td>more than</td>
      <td><?php echo $a > $b; ?></td>
    </tr>
    <tr>
      <td>$a <= $b</td>
      <td>less than or equal to</td>
      <td><?php echo $a <= $b; ?></td>
    </tr>
    <tr>
      <td>$a >= $b</td>
      <td>greater than or equal to</td>
      <td><?php echo $a >= $b; ?></td>
    </tr>
  </tbody>
</table>

<br>

<?php

echo "$a + $b = ", $a + $b,"<br>";
echo "$c - ($a + $b) = ", $c - ($a + $b),"<br>";
echo "$b * $c = ", $b * $c,"<br>";
echo "$b / $c = ", $b / $c,"<br>";
echo "$b / $a =", $b / $a,"<br>";
echo "$b % $a =", $b % $a,"<br>";

?>

</body>
</html>