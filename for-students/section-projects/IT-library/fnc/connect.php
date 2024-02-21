<?php

require_once("helpers.php");

$hostname = "localhost";
$username = "root";
$password = "";
$database = "is_library";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn) {
  die("დაკავშირება ვერ მოხერხდა". mysqli_connect_error());
}

// echo "დაუკავშირდა წამატებით.";