<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload multiple files</title>
  </head>
<body>

<h1>Upload Input Type File Multiple</h1>

<form name="form1" method="post" action="action.php" enctype="multipart/form-data">
	<input type="file" name="filUpload[]" id="filUpload" multiple="multiple">
	<button type="submit" name="btnSubmit" id="btnSubmit">Submit</button>
</form>

</body>
</html>
