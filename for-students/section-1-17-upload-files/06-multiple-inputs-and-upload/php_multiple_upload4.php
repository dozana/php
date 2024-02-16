<html>
<head>
<title>Multiple upload</title>
</head>
<script language="javascript">
	function fncCreateElement(){
		
	   var mySpan = document.getElementById('mySpan');

	   var myLine = document.getElementById('hdnLine');
	   myLine.value++;

	   // Create input text
	   var myElement1 = document.createElement('input');
	   myElement1.setAttribute('type',"text");
	   myElement1.setAttribute('name',"txtGalleryName"+myLine.value);
	   myElement1.setAttribute('id',"txt"+myLine.value);
	   mySpan.appendChild(myElement1);	
	   
	   // Create input file
	   var myElement2 = document.createElement('input');
	   myElement2.setAttribute('type',"file");
	   myElement2.setAttribute('name',"fileUpload"+myLine.value);
	   myElement2.setAttribute('id',"fil"+myLine.value);
	   mySpan.appendChild(myElement2);	
		
       // Create <br>
	   var myElement3 = document.createElement('<br>');
	   myElement3.setAttribute('id',"br"+myLine.value);
	   mySpan.appendChild(myElement3);
	}

	function fncDeleteElement(){

		var mySpan = document.getElementById('mySpan');

		var myLine = document.getElementById('hdnLine');
		
		if(myLine.value > 1 )
		{

			// Remove input text
			var deleteFile = document.getElementById("txt"+myLine.value);
			mySpan.removeChild(deleteFile);

			// Remove input file
			var deleteFile = document.getElementById("fil"+myLine.value);
			mySpan.removeChild(deleteFile);

			// Remove <br>
			var deleteBr = document.getElementById("br"+myLine.value);
			mySpan.removeChild(deleteBr);

			myLine.value--;
		}
	}
</script>
<body>
	<form action="php_multiple_upload5.php" method="post" name="form1" enctype="multipart/form-data">
		<input type="text" name="txtGalleryName1"><input type="file" name="fileUpload1">
		<input name="btnCreate" type="button" value="+" onClick="JavaScript:fncCreateElement();">
		<input name="btnDelete" type="button" value="-" onClick="JavaScript:fncDeleteElement();"><br>	
		<span id="mySpan"></span>
		<input name="hdnLine" type="hidden" value="1">
		<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>