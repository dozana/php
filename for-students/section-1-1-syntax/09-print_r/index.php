<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>print_r</h1>

<?php

$user = [
  'firstName' => 'John',
  'lastName' => 'Doe',
  'email' => 'john.doe@gmail.com',
];

echo print_r($user, true);
echo "<br>";


$b = ['cat', 'dog', 'bird'];
echo print_r($b, true);
echo "<br>";


$users = ['Ann', 'Tom', 'John'];
foreach ($users as $user) {
  echo print_r($user, true)."<br>";
}


?>

</body>
</html>