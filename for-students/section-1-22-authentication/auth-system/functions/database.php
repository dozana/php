<?php
$conn = mysqli_connect("localhost","root","","my_auth2");

function rowCount($result) {
  return mysqli_num_rows($result);
}
function escape($string) {
  global $conn;
  return mysqli_real_escape_string($conn, $string);
}

function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  confirm($result);
  
  return $result;
}

function confirm($result) {
  global $conn;

  if(!$result) {
    die("Query Failed: ". mysqli_error($conn));
  }
}

function fetchArray($result) {
  global $conn;
  
  return mysqli_fetch_array($result);
}
?>