<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Logical Operators</h1>

<p>
  <?php 
    $a = 4;
    $b = 5;

    echo '$a = ' . $a . '<br>'; 
    echo '$b = ' . $b . '<br>'; 

    // Logical AND (&&)
    $a_and_b = $a && $b; // Evaluates to true if both $a and $b are true, otherwise false
    // $a is truthy (non-zero), $b is truthy (non-zero), so $a_and_b will be true
    

    // Logical OR (||)
    $a_or_b = $a || $b; // Evaluates to true if at least one of $a or $b is true, otherwise false
    // $a is truthy (non-zero), $b is truthy (non-zero), so $a_or_b will be true
    

    // Logical XOR (exclusive OR)
    $a_xor_b = $a xor $b; // Evaluates to true if $a or $b is true, but not both, otherwise false
    // $a is truthy (non-zero), $b is truthy (non-zero), so $a_xor_b will be false
    

    // Logical NOT (!)
    $not_a = !$a; // Inverts the truth value of $a
    // $a is truthy (non-zero), so !$a will be false
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
      <td>Logical AND (&&)</td>
      <td><?php print('$a && $b'); ?></td>
      <td><?php echo "a AND b: " . ($a_and_b ? "true" : "false") . "\n"; // Output: trues ?></td>
    </tr>
    <tr>
      <td>Logical OR (||)</td>
      <td><?php print('$a || $b'); ?></td>
      <td><?php echo "a OR b: " . ($a_or_b ? "true" : "false") . "\n"; // Output: true ?></td>
    </tr>
    <tr>
      <td>Logical XOR (exclusive OR)</td>
      <td><?php print('$a XOR $b'); ?></td>
      <td><?php echo "a XOR b: " . ($a_xor_b ? "true" : "false") . "\n"; // Output: false ?></td>
    </tr>
    <tr>
      <td>Logical NOT (!)</td>
      <td><?php print('!$a'); ?></td>
      <td><?php echo "NOT a: " . ($not_a ? "true" : "false") . "\n"; // Output: false ?></td>
    </tr>
  </tbody>
</table>

</body>
</html>