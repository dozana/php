<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<h1>Function Non Returning Values</h1>

<?php
  function fnc_non_returning($arg1, $arg2) {
    echo $arg1 + $arg2;
  }

  // call function
  fnc_non_returning(100, 200); 
?>

</body>
</html>