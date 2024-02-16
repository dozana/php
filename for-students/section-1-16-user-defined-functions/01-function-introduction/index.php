<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<h1>Function Introduction</h1>

<?php
function fnc_sum($value1, $value2) {
	$strSum = $value1 + $value2;
	echo "Sum total : ";
	return $strSum;
}

echo fnc_sum(200, 300);
?>

</body>
</html>