<html>
<head>
<title>Multiple upload file</title>
<script language="javascript">
	function fncCreateElement(){
		
	   var mySpan = document.getElementById('mySpan');
		
		var myElement1 = document.createElement('input');
		myElement1.setAttribute('type',"file");
		myElement1.setAttribute('name',"filUpload[]");
		//myElement1.setAttribute('id',"filUpload[]");
		mySpan.appendChild(myElement1);	   

		//*** Remove Element ***//
		/*
		var deleteEle = document.getElementById('txt1');
		mySpan.removeChild(deleteEle);
		*/

	   var myElement2 = document.createElement('<br>');
	   mySpan.appendChild(myElement2);
	}
</script>
</head>
<body>
	<form name="frmMain" method="post" action="PageMultiUploadToMySQL2.php" enctype="multipart/form-data">
	<input type="file" name="filUpload[]">
	<input name="btnButton" id="btnButton" type="button" value="+" onClick="JavaScript:fncCreateElement();">
	<br>
	<span id="mySpan"></span>
	<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>