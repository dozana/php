<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<h1>Function Arguments</h1>

<?php
  // function fnc_arguments($arg1, $arg2) {
  //   echo "Result: " . $arg1 + $arg2;
  // }

  // call function
  // fnc_arguments(100,200);
?>

<hr>

<?php

function fnc_arguments($arg1, $arg2) {
	echo fnc_arguments1($arg1) + fnc_arguments2($arg2);
}


function fnc_arguments1($value) {
	return $value/2;
}

function fnc_arguments2($value) {
	return $value/2;
}

// call function
fnc_arguments(100,200);

?>



</body>
</html>