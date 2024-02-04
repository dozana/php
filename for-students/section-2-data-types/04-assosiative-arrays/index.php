<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

$names = ["John", "Ann", "Tom"];
print_r($names);

echo "<br>";

$person = [
  "firstName" => "John",
  "lastName" => "Doe",
  "Age" => 25
];

$fullName = $person["firstName"] . " " . $person["lastName"];

echo "Full name: $fullName";

?>

</body>
</html>