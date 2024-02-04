<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

$title = "<h1>User Info:</h1>";

$firstName = "John";
$lastName = "Doe";
$age = 25;

$fullName = $firstName . " " . $lastName;

echo $title;
echo "User full name is: {$fullName} <br>";
echo "User age is: {$age}";

?>

</body>
</html>