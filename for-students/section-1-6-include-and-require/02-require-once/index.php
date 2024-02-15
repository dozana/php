<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>require_once</h1>

<?php

/*

In index.php, the require_once statement includes the contents of helper.php into index.php.

When PHP encounters the first require_once 'helper.php'; statement, it starts executing helper.php.

The output of helper.php (This is the helper file.<br>) is echoed to the output buffer.

After executing helper.php, PHP continues executing the rest of index.php (The main file continues to execute.).

Since require_once is used, the helper.php file is only included once. Even though it's called twice in index.php, PHP recognizes that it has already been included and won't include it again. This is useful for ensuring that a file is included only once, which can prevent problems such as redeclaring functions or defining constants multiple times.

*/

// This is the main file where you want to include another file
echo "This is the main file.<br>";

// Using require_once statement to include another PHP file
require_once 'helper.php';
require_once 'helper.php'; // Including the same file again

echo "The main file continues to execute.";

?>

</body>
</html>