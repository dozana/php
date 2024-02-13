<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>array</h1>

<?php

// 1D array
$city[0]="Sokhumi";
$city[1]="Batumi";
$city[2]="Kutaisi";
$city[3]="Tbilisi";
$city[4]="Rustavi";
$city[5]="Gori";

echo "City: ".$city[1]."<br>";


// 2D array
$country[0][0]="Georgia";
$country[0][1]="Ukraine";
$country[1][2]="Russia";

echo "Country: ".$country[0][1]."<br>";


// 3D array
$zip[0][0][0] = "0160";
$zip[0][1][2] = "0180";
$zip[1][2][3] = "0200";

echo "Country: " . $zip[0][1][2] . "<br>";



$a[0]="Sokhumi";
$a[1]="Batumi";
$a[2]="Kutaisi";
$a[3]="Tbilisi";
$b[0]=30;
$b[1]=31;
$b[2]=32;
$b[3]=33;

for($i=0; $i<=3; $i++) {
  echo"Name : $a[$i] Old = $b[$i] <br>";
}
echo "<br>";

$arr  = ["Sokhumi","Batumi ","Kutaisi","Tbilisi"];
for($i=0; $i<=3; $i++) {
	echo"Name : $arr[$i] <br>";
}

?>

</body>
</html>