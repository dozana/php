<?php
session_start();
$_SESSION["strName"] = "Mr. Smith Company";
$_SESSION["strSiteName"] = "company.Com";
session_write_close();
?>
<html>
  <head>
    <title>Document</title>
  </head>
<body>
Session Created.<br><br>
<a href="PageSession2.php">Check Session</a>
</body>
</html>