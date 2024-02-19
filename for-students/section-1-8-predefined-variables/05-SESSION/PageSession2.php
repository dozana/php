<?php session_start(); ?>
<html>
  <head>
    <title>Document</title>
  </head>
<body>
  
Session Check.<br>
session_id(); = <?php echo session_id();?><br>
$strName = <?php echo isset($_SESSION["strName"]) ? $_SESSION["strName"] : "Not set"; ?><br>
$strSiteName = <?php echo isset($_SESSION["strSiteName"]) ? $_SESSION["strSiteName"] : "Not set"; ?><br>
<br>
<a href="PageSession3.php">Delete Session</a>

</body>
</html>
