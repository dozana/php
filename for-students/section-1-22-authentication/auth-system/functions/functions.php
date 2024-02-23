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

function validationErrors($error_message) {
  echo '<div class="alert alert-warning" role="alert">';
  echo $error_message . '<br>';
  echo '</div>';
}

function emailExists($email) {
  $sql = "SELECT id FROM users WHERE email = '$email'";
  $result = query($sql);

  if (rowCount($result) == 1) {
    return true;
  } else {
    return false;
  }
}

function usernameExists($username) {
  $sql = "SELECT id FROM users WHERE username = '$username'";
  $result = query($sql);

  if (rowCount($result) == 1) {
    return true;
  } else {
    return false;
  }
}

/********************************************
* Validation Functions
********************************************/

function validateUserRegistration() {

  $errors = [];

  $min = 2;
  $max = 20;

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = clean($_POST['first_name']);
    $last_name = clean($_POST['last_name']);
    $username = clean($_POST['username']);
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $confirm_password = clean($_POST['confirm_password']);

    if(strlen($first_name) < $min) {
      $errors[] = "Your first name cannot be less than {$min} characters.";
    }

    if(strlen($first_name) > $max) {
      $errors[] = "Your first name cannot be more than {$max} characters.";
    }

    if(strlen($last_name) < $min) {
      $errors[] = "Your last name cannot be less than {$min} characters.";
    }

    if(strlen($last_name) > $max) {
      $errors[] = "Your last name cannot be more than {$max} characters.";
    }

    if(usernameExists($username)) {
      $errors[] = "Sorry that username already is taken.";
    }

    if(strlen($username) < $min) {
      $errors[] = "Your username cannot be less than {$min} characters.";
    }

    if(strlen($username) > $max) {
      $errors[] = "Your username cannot be more than {$max} characters.";
    }

    if(emailExists($email)) {
      $errors[] = "Sorry that email already is registered.";
    }

    if(strlen($email) > $max) {
      $errors[] = "Your email cannot be more than {$max} characters.";
    }

    if($password !== $confirm_password) {
      $errors[] = "Your password fields do not match.";
    }

    if(!empty($errors)) {
      foreach($errors as $error) {
        echo validationErrors($error);
      }
    }
  }
}

?>