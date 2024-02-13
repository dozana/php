<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>defined</h1>

<?php

define("USERNAME", "admin");
define("PASSWORD", "123456");

if(defined("USERNAME") && defined("PASSWORD")) {
  echo "USERNAME = true; value = " . USERNAME . "<br>";
  echo "PASSWORD = true; value = " . PASSWORD . "<br>";
} else {
  echo "USERNAME or PASSWORD is false <br>";
}


?>

</body>
</html>