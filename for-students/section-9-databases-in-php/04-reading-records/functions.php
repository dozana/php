<?php

function readRecords() {
  global $conn;
  
  $sql = "SELECT * FROM my_passwords";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_row($result)) {
    print_r($row);
  }
}

?>