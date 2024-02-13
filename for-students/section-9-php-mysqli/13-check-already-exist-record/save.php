<html>
	<head>
		<title>Check already exist-record</title>
	</head>
<body>

<?php
$objConnect = mysqli_connect("localhost","root","","test") or die("Error Connect to Database");
$strSQL = "SELECT * FROM my_gallery WHERE id = '".$_POST["id"]."' ";
$objQuery = mysqli_query($objConnect, $strSQL);
$objResult = mysqli_fetch_array($objQuery);

if($objResult) {
		echo "CustomerID already exist.";
} else {
	$strSQL = "";
	$strSQL = "INSERT INTO my_gallery ";
	$strSQL .="(title,photo) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["title"]."','".$_POST["photo"]."') ";
	$objQuery = mysqli_query($objConnect, $strSQL);
	if($objQuery) {
		echo "Save Done.";
	} else {
		echo "Error Save [".$strSQL."]";
	}
}
mysqli_close($objConnect);
?>

</body>
</html>