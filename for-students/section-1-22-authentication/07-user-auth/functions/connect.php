<?php

require_once('config/database.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$conn) {
  die("დაკავშირება ვერ მოხერხდა". mysqli_connect_error());
}

// echo "დაუკავშირდა წამატებით.";