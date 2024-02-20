<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "is_library";

$db = mysqli_connect($hostname, $username, $password, $database);

if(!$db) {
  die("დაკავშირება ვერ მოხერხდა". mysqli_connect_error());
}

// echo "დაუკავშირდა წამატებით.";