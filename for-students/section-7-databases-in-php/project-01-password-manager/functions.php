<?php

function dbConnection () {
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "test";

  $conn = mysqli_connect($hostname, $username, $password, $database);

  if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
}

function readRecords() {
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

function createRecord() {
  global $conn;;

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(!empty($username) && !empty($password)) {
    $query = "INSERT INTO my_passwords('username','password') 
    VALUES('$username','$password')";
    $result = mysqli_query($conn, $query);

    if(!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    } else {
    echo "New record created successfullu.";
    }
  } else {
    echo "Enter username and password.";
  }

  mysqli_close($conn);
}

?>