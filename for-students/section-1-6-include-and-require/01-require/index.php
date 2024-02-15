<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>require</h1>

<?php

/*

In index.php, the require statement includes the contents of helper.php into index.php.

When PHP encounters the require 'helper.php'; statement, it starts executing helper.php.

The output of helper.php (This is the helper file.<br>) is echoed to the output buffer.

After executing helper.php, PHP continues executing the rest of index.php (The main file continues to execute.).

If helper.php contains functions or variables that you want to use in index.php, you can use them after including helper.php with require.

It's important to note that if the file specified in require does not exist or contains an error, PHP will produce a fatal error and halt execution of the script. This makes require stricter compared to include.

*/

// This is the main file where you want to include another file
echo "This is the main file.<br>";

// Using require statement to include another PHP file
require 'helper.php';

echo "The main file continues to execute.";
?>

</body>
</html>