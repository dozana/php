<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Field field upload</title>
</head>
<body>
  
<?php
if(isset($_FILES["filUpload"]) && $_FILES["filUpload"]["error"] === UPLOAD_ERR_OK) {
    $uploadDirectory = "myfile/";
    $uploadFileName = uniqid() . "_" . basename($_FILES["filUpload"]["name"]);
    $uploadFilePath = $uploadDirectory . $uploadFileName;

    // Check if a file with the same name already exists
    if(file_exists($uploadFilePath)) {
        // Delete the previously uploaded file
        unlink($uploadFilePath);
    }

    // Move the uploaded file to the destination directory with the unique filename
    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"], $uploadFilePath)) {
        echo "Copy/Upload Complete";
    } else {
        echo "Failed to move uploaded file.";
    }
} else {
    echo "Error occurred during file upload.";
}
?>

</body>
</html>
