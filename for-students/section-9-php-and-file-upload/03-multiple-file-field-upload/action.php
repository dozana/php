<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>

<?php
if(isset($_FILES["filUpload"])) {
    // Loop through each uploaded file
    for($i = 0; $i < count($_FILES["filUpload"]["name"]); $i++) {
        // Check if the file name is not empty
        if($_FILES["filUpload"]["name"][$i] != "") {
            // Define the upload directory
            $uploadDirectory = "myfile/";
            
            // Move the uploaded file to the destination directory
            if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i], $uploadDirectory . $_FILES["filUpload"]["name"][$i])) {
                echo "Copy/Upload Complete<br>";
            } else {
                echo "Failed to copy/upload file<br>";
            }
        }
    }
} else {
    echo "No files uploaded";
}
?>

</body>
</html>
