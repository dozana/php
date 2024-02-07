<?php

function createRecord() {
  global $conn;
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO my_passwords(username, password) ";
  $sql .= "VALUES ('$username', '$password')";

  $result = mysqli_query($conn, $sql);

  if(!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    echo "New record created successfullu.";
  }
}