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



?>