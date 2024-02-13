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

function deleteRecord() {
  global $conn;

  $id = $_POST['id'];

  $sql = "DELETE FROM my_passwords 
          WHERE `my_passwords`.`id` = $id";

  $result = mysqli_query($conn, $sql);

  if(!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    echo "Record deleted successfullu.";
  }
}

?>