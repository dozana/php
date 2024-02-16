<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>md5()</h1>

<?php

//*** Test check password ***//
echo md5("password123")."<br>"; // 2d78f43828cb92f275f9888b1cd09cb6

if(md5("password123") == "482c811da5d5b4bc6d497ffa98491e38") {
  echo "Wecome to my Site";
} else {
  echo "Password is wrong";
}

?>

</body>
</html>