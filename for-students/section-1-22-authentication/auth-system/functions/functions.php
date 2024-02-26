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

function tokenGenerator() {
  $token = md5(uniqid(mt_rand(), true));
  $_SESSION['token'] = $token; // Store the token in the session
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

function sendEmail($email, $subject, $msg, $headers) {
  return mail($email, $subject, $msg, $headers);
}


/********************************************
* Validation User Registration Function
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
      } else {
        setMessage("Sorry we could not register the user.");
        redirect("index.php");
      }
    }
  }
}

/********************************************
* Validation User Login Function
********************************************/
function validateUserLogin() {

  $errors = [];

  $min = 2;
  $max = 50;

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $remember = isset($_POST['remember']);

    if(empty($email)) {
      $errors[] = "E-Mail field cannot be empty.";
    }

    if(empty($password)) {
      $errors[] = "Password field cannot be empty.";
    }

    if(!empty($errors)) {
      foreach($errors as $error) {
        echo validationErrors($error);
      }
    } else {
      if(loginUser($email, $password, $remember)) {
        //setMessage("You are logged in.");
        redirect("dashboard.php");
      } else {
        setMessage("Something went wrong, your credentials are not correct.");
        redirect("login.php");
      }
    }
  }
}


/********************************************
* User Registration Function
********************************************/
function registerUser($first_name, $last_name, $username, $email, $password) {  
  $first_name = escape($first_name);
  $last_name = escape($last_name);
  $username = escape($username);
  $email = escape($email);
  $password = escape($password);
  
  if(emailExists($email) || usernameExists($username)) {
    return false;
  } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_code = md5($username . microtime());
    
    $sql = "INSERT INTO users (first_name, last_name, username, email, password, confirm_code, active) 
            VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', '$confirm_code', 0)";
  
    $result = query($sql);
    confirm($result);

    $base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $activation_link = "http://$_SERVER[HTTP_HOST]$base_url/login/activate.php?email=$email&code=$confirm_code";

    $subject = "Activate Account";
    $msg = "Please click the link below to activate your account: $activation_link";
    $headers = "From: noreply@company.com";

    sendEmail($email, $subject, $msg, $headers);

    return true;
  }
}

/********************************************
* User Login Function
********************************************/
function loginUser($email, $password, $remember) {
  $sql = "SELECT id, password FROM users WHERE email='".escape($email)."' AND active = 1";
  $result = query($sql);

  if(rowCount($result) == 1) {
    $row = fetchArray($result);
    $db_password = $row['password'];

    if(password_verify($password, $db_password)) {
      // 
      if($remember == "on") {
        setcookie('email', $email, time() + 60);
      }

      $_SESSION['email'] = $email;

      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }

}

/********************************************
* Logged in Function
********************************************/
function loggedIn() {
  if(isset($_SESSION['email']) || $_COOKIE['email']) {
    return true;
  } else {
    return false;
  }
}




/********************************************
* Activate User Functions
* http://localhost/activate.php?email=john.doe@gmail.com&code=2fc5f76106016acc97fe9b1968a8ae16
********************************************/
function activateUser() {
  if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['email'])) {
      $email = clean($_GET['email']);
      $confirm_code = clean($_GET['code']);

      $sql = "SELECT id FROM users WHERE email='".escape($_GET['email'])."' AND confirm_code='".$_GET['code']."'";
      $result = query($sql);
      confirm($result);

      if(rowCount($result) == 1) {
        $sql2 = "UPDATE users SET active = 1, confirm_code = 0 WHERE email='".escape($email)."' AND confirm_code='".escape($confirm_code)."'";
        $result2 = query($sql2);
        confirm($result2);
  
        setMessage("Your account has been activated, please login.");
        redirect("login.php");
      } else {
        setMessage("Sorry your account could not be activated.");
        redirect("login.php");
      }
    }
  }
}


/********************************************
* Recovery Password Function
********************************************/

function recoverPassword() {
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
      $email = escape($_POST['email']);

      if(emailExists($_POST['email'])) {
        $confirm_code = md5($email . microtime());
        $base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        $reset_link = "http://$_SERVER[HTTP_HOST]$base_url/login/code.php?email=$email&code=$confirm_code";
    
        $subject = "Reset your password";
        $msg = "This is your password reset code {$confirm_code} Please click the link to reset the password: {$reset_link}";
        $headers = "From: noreply@company.com";

        sendEmail($email, $subject, $msg, $headers);
      }
    }
  }
}

?>