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
    echo '<div class="alert alert-secondary" role="alert">';
    echo $_SESSION['message'];
    echo '</div>';

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
  $max = 50;

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
    } else {
      if(registerUser($first_name, $last_name, $username, $email, $password)) {
        setMessage("Please check your email or spam folder for activation link.");
        redirect("index.php");
      }
    }
  }
}


function registerUser($first_name, $last_name, $username, $email, $password) {  
  $first_name = escape($first_name);
  $last_name = escape($last_name);
  $username = escape($username);
  $email = escape($email);
  $password = escape($password);
  
  if(emailExists($email) || usernameExists($username)) {
    return false;
  } else {
    $confirm_code = md5($username . microtime());
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (first_name, last_name, username, email, password, confirm_code, active) 
            VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', '$confirm_code', 0)";
  
    $result = query($sql);
    confirm($result);

    return true;
  }
}


?>