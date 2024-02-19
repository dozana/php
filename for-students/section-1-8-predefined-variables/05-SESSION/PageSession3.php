<?php
session_start();
//unset($_SESSION["strName"]); // Optionally, you can unset specific session variables here
//unset($_SESSION["strSiteName"]); // Optionally, you can unset specific session variables here
session_destroy();
?>
<html>
  <head>
    <title>Document</title>
  </head>
<body>
  
Created Check.<br>
$strName = <?php echo isset($_SESSION["strName"]) ? $_SESSION["strName"] : "Not set"; ?><br>
$strSiteName = <?php echo isset($_SESSION["strSiteName"]) ? $_SESSION["strSiteName"] : "Not set"; ?><br>
<br>
<a href="PageSession1.php">Create Session</a><br>
<a href="PageSession2.php">Check Session</a><br>

</body>
</html>
