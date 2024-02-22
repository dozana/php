<?php
$conn = mysqli_connect("localhost","root","","my_auth2");

function escape($string) {
  global $conn;
  mysqli_real_escape_string($conn, $string);
}

function query($query) {
  global $conn;
  return mysqli_query($conn, $query);
}

function confirm($result) {
  global $conn;
  if(!$result) {
    die("Query Failed: ". mysqli_error($conn));
  }
}

function fetch_array($result) {
  global $conn;
  return mysqli_fetch_array($result);
}
?>