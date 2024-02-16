<?php

$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'test';

$conn = mysqli_connect($localhost, $username, $password, $database);

if(!$conn) {
  die("connection failed: ".mysqli_connect_error());
}

?>