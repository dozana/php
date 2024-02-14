<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>System Variable</h1>

<?php

$_SERVER["username"] = "user";
$_SERVER["password"] = "123456";

echo "Username: " . $_SERVER["username"] . "<br>";
echo "Password: " . $_SERVER["password"] . "<br>";

?>

</body>
</html>