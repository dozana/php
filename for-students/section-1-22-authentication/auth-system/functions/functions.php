<?php

/********************************************
* Helper Functions
********************************************/
function clean($string) {
  return htmlentities($string, ENT_QUOTES,"");
}

function redirect($location) {
  return header("Location: {$location}");
}

function setMessage($message) {
  if (!empty($message)) {
    $_SESSION['message'] = $message;
  } else {
    $message = "";
  }
}

function displayMessage() {
  if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}

function tockenGenerator() {
  $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
  return $token;
}

/********************************************
* Validation Functions
********************************************/

function validate_user_registration() {
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = clean($_POST['first_name']);
    $last_name = clean($_POST['last_name']);
    $username = clean($_POST['username']);
    $password = clean($_POST['password']);
    $confirm_password = clean($_POST['confirm_password']);

    
  }
}

?>