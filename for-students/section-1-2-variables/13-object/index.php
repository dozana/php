<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>object</h1>

<?php

class foo
{
  public function bar() {
    echo "doingitg foo";
  }
}

$bar = new foo();
$bar->bar();

?>

</body>
</html>