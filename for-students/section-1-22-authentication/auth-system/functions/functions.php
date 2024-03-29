<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


/********************************************
* Helpers
********************************************/
function clean($string) {
  return htmlentities($string ?? '', ENT_QUOTES, "");
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

function sendEmail($email=null, $subject=null, $msg=null, $headers=null) {

  //Server settings
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = Config::SMTP_HOST;
  $mail->SMTPAuth = true;
  $mail->Port = Config::SMTP_PORT;
  $mail->Username = Config::SMTP_USER;
  $mail->Password = Config::SMTP_PASS;

  $mail->setFrom('info@auth.com', 'John Doe');
  $mail->addAddress($email);

  //Content
  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Subject = $subject;
  $mail->Body    = $msg;
  $mail->AltBody = $msg;

  if(!$mail->send()) {
    echo "Message could not be sent.";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  } else {
    echo "Message has been sent.";
  }

  // return mail($email, $subject, $msg, $headers);
}



/********************************************
* User Registration
********************************************/
function registerUser($first_name, $last_name, $username, $email, $password) {  
  $first_name = escape($first_name);
  $last_name = escape($last_name);
  $username = escape($username);
  $email = escape($email);
  $password = escape($password);
  $role = 'user';
  
  if(emailExists($email) || usernameExists($username)) {
    return false;
  } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_code = md5($email . microtime());
    
    $sql = "INSERT INTO users (first_name, last_name, username, email, password, confirm_code, active, role) 
            VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', '$confirm_code', 0, '$role')";
  
    query($sql);

    $base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $activation_link = "http://$_SERVER[HTTP_HOST]$base_url/activate.php?email=$email&code=$confirm_code";

    $subject = "Activate Account";
    $msg = "Please click the <a href='{$activation_link}' target='_blank'>link</a> below to activate your account.";
    $headers = "From: noreply@company.com";

    sendEmail($email, $subject, $msg, $headers);

    return true;
  }
}

/********************************************
* User Registration Validation
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
* User Login
********************************************/
function loginUser($email, $password, $remember) {
  $sql = "SELECT id, password, role, first_name, last_name FROM users WHERE email='".escape($email)."' AND active = 1";
  $result = query($sql);

  if(rowCount($result) == 1) {
    $row = fetchArray($result);
    $db_password = $row['password'];
    $db_role = $row['role'];
    $db_first_name = $row['first_name'];
    $db_last_name = $row['last_name'];

    if(password_verify($password, $db_password)) {
      if($remember == "on") {
        setcookie('email', $email, time() + 60);
      }

      $_SESSION['email'] = $email;
      $_SESSION['role'] = $db_role;
      $_SESSION['first_name'] = $db_first_name;
      $_SESSION['last_name'] = $db_last_name;

      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

/********************************************
* User Login Validation
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
        if($_SESSION['role'] == 'admin') {
          redirect('dashboard-admin.php');
        } else {
          redirect('dashboard-user.php');
        }
        // redirect("dashboard.php");
      } else {
        setMessage("Something went wrong, your credentials are not correct.");
        redirect("login.php");
      }
    }
  }
}

/********************************************
* Logged In
********************************************/
function loggedIn() {
  if(isset($_SESSION['email']) || (isset($_COOKIE['email']) && !empty($_COOKIE['email']))) {
    return true;
  } else {
    return false;
  }
}

function isAdmin() {
  if ($_SESSION['role'] != "admin") {
    redirect("index.php");
  }
}

function isUser() {
  if ($_SESSION['role'] != "user") {
    redirect("index.php");
  }
}


function userRole($role) {
  if(!isset($_SESSION['email']) && (!isset($_COOKIE['email']) || empty($_COOKIE['email']))) {
    redirect("index.php");
  }

  if ($_SESSION['role'] != $role) {
    redirect("index.php");
  }
}



/********************************************
* User Activation
********************************************/
function activateUser() {
  if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['email'])) {
      $email = clean($_GET['email']);
      $confirm_code = clean($_GET['code']);

      $sql = "SELECT id FROM users WHERE email='".escape($_GET['email'])."' AND confirm_code='".$_GET['code']."'";
      $result = query($sql);

      if(rowCount($result) == 1) {
        $sql2 = "UPDATE users SET active = 1, confirm_code = 0 WHERE email='".escape($email)."' AND confirm_code='".escape($confirm_code)."'";
        $result2 = query($sql2);
  
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
* Password Recovery
********************************************/
function recoverPassword() {
  if($_SERVER['REQUEST_METHOD'] == "POST") {

    if(isset($_POST['recover_submit'])) {
      if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
        $email = escape($_POST['email']);
  
        if(emailExists($_POST['email'])) {
          $confirm_code = md5($email . microtime());
          $base_url = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
          $reset_link = "http://$_SERVER[HTTP_HOST]$base_url/code.php?email=$email&code=$confirm_code";
      
          setcookie('temp_access_code', $confirm_code, time() + 900);
  
          $sql = "UPDATE users SET confirm_code = '".escape($confirm_code)."' WHERE email = '".escape($email)."'";
          $result = query($sql);
  
          $subject = "Reset your password";
          $msg = "This is your password reset code {$confirm_code} ";
          $msg .= "Please click the <a href='{$reset_link}' target='_blank'>link</a> to reset the password.";
          $headers = "From: noreply@company.com";
  
          if(!sendEmail($email, $subject, $msg, $headers)) {
            echo validationErrors("E-mail could not be sent.");
          }
  
          setMessage("Please check your email or spam folder for a password reset code.");
          redirect("index.php");
  
        } else {
          echo validationErrors("This email does not exist.");
        }
      } else {
        // Token does not exist.
        redirect("index.php");
      }
    }

    // token check
    if(isset($_POST['cancel_submit'])) {
      redirect("login.php");
    }

  }
}

/********************************************
* Code Validation
********************************************/
function confirmCode() {
  if(isset($_COOKIE['temp_access_code'])) {
    if(!isset($_GET['email']) && !isset($_GET['code'])) {
      redirect("index.php");
    } else if(empty($_GET['email']) || empty($_GET['code'])) {
      redirect("index.php");
    } else {
      if(isset($_POST['code'])) {
        $email = clean($_GET['email']);
        $confirm_code = clean($_POST['code']);
        
        $sql = "SELECT id FROM users WHERE confirm_code = '".escape($confirm_code)."' AND email = '".escape($email)."'";
        
        $result = query($sql);

        if(rowCount($result) == 1) {
          setcookie('temp_access_code', $confirm_code, time() + 500);
          redirect("reset.php?email=$email&code=$confirm_code");
        } else {
          echo validationErrors("Sorry, wrong validation code.");
        }
      }
    }
  } else {
    setMessage("Sorry your validation cookie was expired.");
    redirect("recover.php");
  }
}

/********************************************
* Password Reset
********************************************/
function passwordReset() {
  if(isset($_COOKIE["temp_access_code"])) {
    if(isset($_GET['email']) && isset($_GET['code'])) {
      if(isset($_SESSION['token']) && isset($_POST['token'])) {
        if($_POST['token'] === $_SESSION['token']) {

          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];

          if($password === $confirm_password) {
            $updated_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password ='".escape($updated_password)."', confirm_code = 0, active = 1 WHERE email ='".escape($_GET['email'])."'";
            $result = query($sql);
      
            setMessage("Your password has been changed, you can login.");
            redirect("login.php");
          } else {
            echo validationErrors("Password fields don't match.");
          }
        }
      }
    }
  } else {
    setMessage("Sorry your time has expired.");
    redirect("recover.php");
  }
}
?>