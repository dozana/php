<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>$_SERVER</h1>

<?php

/*
  DOCUMENT_ROOT Show Path Root Directory Home
  GATEWAY_INTERFACE Show Cgi interface values
  ​​HTTP_ACCEPT_LANGUAGE Language
  HTTP_CONNECTION Connection status
  HTTP_USER_AGENT Shows the type of program being called, such as IE
  PATH_INFO Shows the name of the document.
  PATH_TRANSLATED Shows the path of the document.
  QUERY_STRING Shows the value in the Query String
  . REMOTE_ADDR Shows the IP Address of the incoming machine
  . REMOTE_PORT Shows the Port of the incoming machine.
  REQUEST_METHOD Shows the sending value as Get or Post
  SCRIPT_NAME Shows document name
  SERVER_NAME Shows Server name
  SERVER_PORT Shows Port of Server
  SERVER_PROTOCOL Shows protocol of Server
  SERVER_SOFTWARE Shows program of Server
*/


// Loop through $_SERVER superglobal array
foreach ($_SERVER as $key => $value) {
  // Output key-value pairs
  echo "$key = $value<br>";
}
?>

<br><br>

<?php
echo "\$_SERVER[\"HTTP_ACCEPT\"] = ".$_SERVER["HTTP_ACCEPT"]."<br>";
echo "\$_SERVER[\"HTTP_ACCEPT_LANGUAGE\"] = ".$_SERVER["HTTP_ACCEPT_LANGUAGE"]."<br>";
echo "\$_SERVER[\"HTTP_ACCEPT_ENCODING\"] = ".$_SERVER["HTTP_ACCEPT_ENCODING"]."<br>";
echo "\$_SERVER[\"HTTP_USER_AGENT\"] = ".$_SERVER["HTTP_USER_AGENT"]."<br>";
echo "\$_SERVER[\"HTTP_HOST\"] = ".$_SERVER["HTTP_HOST"]."<br>";
echo "\$_SERVER[\"HTTP_CONNECTION\"] = ".$_SERVER["HTTP_CONNECTION"]."<br>";
echo "\$_SERVER[\"PATH\"] = ".$_SERVER["PATH"]."<br>";
echo "\$_SERVER[\"SERVER_SIGNATURE\"] = ".$_SERVER["SERVER_SIGNATURE"]."<br>";
echo "\$_SERVER[\"SERVER_SOFTWARE\"] = ".$_SERVER["SERVER_SOFTWARE"]."<br>";
echo "\$_SERVER[\"SERVER_NAME\"] = ".$_SERVER["SERVER_NAME"]."<br>";
echo "\$_SERVER[\"SERVER_ADDR\"] = ".$_SERVER["SERVER_ADDR"]."<br>";
echo "\$_SERVER[\"SERVER_PORT\"] = ".$_SERVER["SERVER_PORT"]."<br>";
echo "\$_SERVER[\"REMOTE_ADDR\"] = ".$_SERVER["REMOTE_ADDR"]."<br>";
echo "\$_SERVER[\"DOCUMENT_ROOT\"] = ".$_SERVER["DOCUMENT_ROOT"]."<br>";
echo "\$_SERVER[\"SERVER_ADMIN\"] = ".$_SERVER["SERVER_ADMIN"]."<br>";
echo "\$_SERVER[\"SCRIPT_FILENAME\"] = ".$_SERVER["SCRIPT_FILENAME"]."<br>";
echo "\$_SERVER[\"REMOTE_PORT\"] = ".$_SERVER["REMOTE_PORT"]."<br>";
echo "\$_SERVER[\"GATEWAY_INTERFACE\"] = ".$_SERVER["GATEWAY_INTERFACE"]."<br>";
echo "\$_SERVER[\"SERVER_PROTOCOL\"] = ".$_SERVER["SERVER_PROTOCOL"]."<br>";
echo "\$_SERVER[\"REQUEST_METHOD\"] = ".$_SERVER["REQUEST_METHOD"]."<br>";
echo "\$_SERVER[\"QUERY_STRING\"] = ".$_SERVER["QUERY_STRING"]."<br>";
echo "\$_SERVER[\"REQUEST_URI\"] = ".$_SERVER["REQUEST_URI"]."<br>";
echo "\$_SERVER[\"SCRIPT_NAME\"] = ".$_SERVER["SCRIPT_NAME"]."<br>";
echo "\$_SERVER[\"PHP_SELF\"] = ".$_SERVER["PHP_SELF"]."<br>";
echo "\$_SERVER[\"REQUEST_TIME\"] = ".$_SERVER["REQUEST_TIME"]."<br>";
?>

</body>
</html>