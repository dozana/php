<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>User Login Authentication</h1>

<?php
function fncAuthentication() {
    header('WWW-Authenticate: Basic realm="localhost"');
    header("HTTP/1.0 401 Unauthorized");
    exit;
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || 
    trim($_SERVER['PHP_AUTH_USER']) === "" || trim($_SERVER['PHP_AUTH_PW']) === "") {
    fncAuthentication();
} else {
    $user = $_SERVER["PHP_AUTH_USER"];
    $password = $_SERVER["PHP_AUTH_PW"];

    echo "<br>User : $user";
    echo "<br>Password : $password";
}
?>


</body>
</html>