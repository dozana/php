<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>include_once</h1>

<?php

// This is the main file where you want to include another file
echo "This is the main file.<br>";

// Using include_once statement to include another PHP file
include_once 'helper.php';
include_once 'helper.php'; // Including the same file again

echo "The main file continues to execute.";

?>

</body>
</html>