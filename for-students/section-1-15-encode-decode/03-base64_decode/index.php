<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>base64_decode()</h1>

<?php
// The base64 encoded string
$encoded_string = 'SGVsbG8sIFdvcmxkIQ==';

// Decode the base64 string
$decoded_string = base64_decode($encoded_string);

// Output the decoded string
echo "Encoded string: $encoded_string <br>";
echo "Decoded string: $decoded_string <br>";
?>

</body>
</html>