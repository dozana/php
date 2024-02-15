<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php

  $fileUpload = $_FILES["fileUpload"];

  // Output file details
  echo "\$_FILES['fileUpload']['name'] = {$fileUpload['name']}<br>";
  echo "\$_FILES['fileUpload']['type'] = {$fileUpload['type']}<br>";
  echo "\$_FILES['fileUpload']['size'] = {$fileUpload['size']}<br>";
  echo "\$_FILES['fileUpload']['tmp_name'] = {$fileUpload['tmp_name']}<br>";
  echo "\$_FILES['fileUpload']['error'] = {$fileUpload['error']}<br>";

  // Move uploaded file to desired directory
  if (move_uploaded_file($fileUpload['tmp_name'], "myfile/{$fileUpload['name']}")) {
      echo "Copy/Upload Complete.";
  }

?>

</body>
</html>