<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>base64_encode()</h1>

<?php
// The string to encode
$string = 'Hello, World!';

// Encode the string to base64
$encoded_string = base64_encode($string);

// Output the encoded string
echo $encoded_string;
?>

</body>
</html>