<?php

function connect () {
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "test";

  $conn = mysqli_connect($hostname, $username, $password, $database);

  if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
}

function read() {
  global $conn;

  $query = "SELECT * FROM my_passwords";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result) > 0;

  if (!$count) { 
    echo "0 results";
  } else {
    echo '<table class="table table-bordered table-hover">';
      echo '<thead>';
        echo '<tr>';
          echo '<th>Username</th>';
          echo '<th>Password</th>';
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['password'].'</td>';
          echo '</tr>';
        }
      echo '</tbody>';
    echo '</table>';
  }

  mysqli_close($conn);
}

function create()
{
  global $conn;

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "INSERT INTO my_passwords(username, password) VALUES('$username', '$password')";
  
  $result = mysqli_query($conn, $sql);

  if(!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } else {
    echo "New record created successfullu.";
  }

  mysqli_close($conn);
}

function ids() {
  global $conn;

  $sql = "SELECT id, username FROM my_passwords";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)) {
    echo '<option>'.$row["id"].'</option>';
  }
}

function update() {
  global $conn;

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $id = intval($_POST['id']);

  $sql = "UPDATE my_passwords SET 
          username = '$username',
          password = '$password'
          WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if($result) {
    echo "Record updated successfully.";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

function delete() {
  global $conn;

  $id = intval($_POST['id']);

  $sql = "DELETE FROM my_passwords WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if($result) {
    echo "Record deleted successfully.";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}

?>