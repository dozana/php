<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>String Operators</h1>

<?php

$string1 = "Hello";
$string2 = "World";

$concat = $string1 . $string2;

?>

<p><?php echo '$string1 = ' . $string1 . '<br>' . '$string2 = ' . $string2; ?></p>

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
      <td>Concatonation</td>
      <td>$string1 . $string2</td>
      <td><?php echo $concat; ?></td>
    </tr>
  </tbody>
</table>

</body>
</html>