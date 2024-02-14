<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>foreach</h1>

<?php

$users = ['Tom', 'Ann', 'John'];
foreach ($users as $user) {
  echo "User: $user<br>";
}
reset($users);


echo "---------<br>";
foreach ($users as $key => $value) {
  echo "Key: $key, Value: $value <br>";
}
echo "---------<br>";


foreach ($users as $key => $value) {
  echo "Key: $key, Value: $value <br>";
}


?>

</body>
</html>