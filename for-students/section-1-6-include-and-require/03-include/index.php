<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>include</h1>

<?php

/*

In index.php, the include statement includes the contents of helper.php into index.php.

When PHP encounters the include 'helper.php'; statement, it starts executing helper.php.

The output of helper.php (This is the helper file.<br>) is echoed to the output buffer.

After executing helper.php, PHP continues executing the rest of index.php (The main file continues to execute.).

Unlike require, which produces a fatal error if the file cannot be included, include only produces a warning and continues execution of the script. This makes include more lenient, but it's important to handle these warnings appropriately.

*/

// This is the main file where you want to include another file
echo "This is the main file.<br>";

// Using include statement to include another PHP file
include 'helper.php';

echo "The main file continues to execute.";

?>

</body>
</html>