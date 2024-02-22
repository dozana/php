<?php
session_start();

if(isset($_SESSION["email"])){
  switch($_SESSION['role']) {
    case 'admin':
      header("Location: admin_dashboard.php");
      exit();
    case 'user':
      header("Location: user_dashboard.php");
      exit();
    case 'guest':
      header("Location: guest_dashboard.php");
      exit();
    default:
      echo "Unknown role";
  }
}

$hostname = "localhost";
$username = "root";
$password = "";
$database = "my_auth";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}
?>