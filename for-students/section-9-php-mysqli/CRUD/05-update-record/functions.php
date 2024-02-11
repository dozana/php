<?php

function showAllData() {
  global $conn;
  
  $query = "SELECT * FROM my_passwords";
  $result = mysqli_query($conn, $query) or die();
  
  if(!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
  
  while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    echo "<option value=\"$id\">$id</option>";
  }
}

function updateRecord() {
  global $conn;

  $username = $_POST['username'];
  $password = $_POST['password'];
  $id = $_POST['id'];

  $sql = "UPDATE `my_passwords` SET 
  `username` = '$username', 
  `password` = '$password' 
  WHERE `my_passwords`.`id` = $id";

  $result = mysqli_query($conn, $sql);

  if(!$result) {
    // die("Query Failed". mysqli_error($conn));
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    echo "Record updated successfullu.";
  }
}

?>