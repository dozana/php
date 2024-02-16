<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<h1>Function Returning Values</h1>

<?php
  function fnc_returning1($arg1,$arg2) {
    return $arg1+$arg2;
  }

  function fnc_returning2($arg1,$arg2) {
    return $arg1-$arg2;
  }

  // call function
  $fnc1 = fnc_returning1(100,200);
  $fnc2 = fnc_returning2(100,200);
  
  echo "\$fnc1 : $fnc1 <br>";
  echo "\$fnc2 : $fnc2 <br>";
  echo "\$fnc1+\$fnc2 : ".($fnc1+$fnc2);
?>

</body>
</html>