<!DOCTYPE html>
<html lang="en">
<head>
<title>Upload multiple files</title>
</head>
<body>

<?php
if(isset($_FILES["filUpload"]) && $_FILES["filUpload"]["error"] !== UPLOAD_ERR_NO_FILE) {
    // Check if any file has been uploaded
    if(isset($_FILES["filUpload"]["name"]) && !empty($_FILES["filUpload"]["name"][0])) {
        // Define the directory where files will be uploaded
        $uploadDirectory = "myfile/";

        // Loop through each uploaded file
        foreach($_FILES['filUpload']['tmp_name'] as $key => $val) {
            $file_name = $_FILES['filUpload']['name'][$key];
            $file_size = $_FILES['filUpload']['size'][$key];
            $file_tmp = $_FILES['filUpload']['tmp_name'][$key];
            $file_type = $_FILES['filUpload']['type'][$key];  

            // Generate a unique filename
            $unique_filename = uniqid() . "_" . $file_name;

            // Check if a file with the same name already exists
            if(file_exists($uploadDirectory . $unique_filename)) {
                // Delete the previously uploaded file
                unlink($uploadDirectory . $unique_filename);
            }

            // Move the uploaded file to the destination directory with the unique filename
            move_uploaded_file($file_tmp, $uploadDirectory . $unique_filename);
        }

        echo "Copy/Upload Complete";
    } else {
        echo "Please upload a file.";
    }
} else {
    echo "No file selected for upload.";
}
?>

</body>
</html>
