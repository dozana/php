<html>
<head>
<title>Multiple upload</title>
</head>
<body>

<h1>Multiple Inputs and Upload</h1>

<form action="php_multiple_upload2.php" method="post" name="form1" enctype="multipart/form-data">
	<input type="text" name="txtGalleryName1"><input type="file" name="fileUpload1"><br>
	<input type="text" name="txtGalleryName2"><input type="file" name="fileUpload2"><br>
	<input type="text" name="txtGalleryName3"><input type="file" name="fileUpload3"><br>
	<input type="text" name="txtGalleryName4"><input type="file" name="fileUpload4"><br>
	<input name="hdnLine" type="hidden" value="4">
	<input name="btnSubmit" type="submit" value="Submit">
</form>

<a href="php_multiple_upload4.php">Open</a>
</body>
</html>