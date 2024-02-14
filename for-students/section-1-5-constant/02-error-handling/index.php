<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Error Handling</h1>

<?php
$source = "/myfile1/file.txt";
$destination = "/myfile2/file.txt";

if (file_exists($source)) {
    if (copy($source, $destination)) {
        echo "File copied successfully.";
    } else {
        echo "Failed to copy the file.";
    }
} else {
    echo "Source file does not exist.";
}
?>

</body>
</html>