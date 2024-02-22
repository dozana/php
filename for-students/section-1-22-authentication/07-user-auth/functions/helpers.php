<?php

// Helper function to sanitize input data
function sanitizeInput($data) {
  $data = trim($data); // Remove whitespace from the beginning and end of the string
  $data = stripslashes($data); // Remove backslashes (\) from the string
  $data = htmlspecialchars($data); // Convert special characters to HTML entities
  return $data;
}

// Helper function to echo messages with different styles
function showMessage($message, $type = 'success') {
  $classes = array(
      'success' => 'alert alert-success',
      'error' => 'alert alert-danger',
      'warning' => 'alert alert-warning',
      'info' => 'alert alert-info'
  );

  if (array_key_exists($type, $classes)) {
      echo '<div class="' . $classes[$type] . '" role="alert">' . $message . '</div>';
  } else {
      echo '<div class="alert alert-secondary" role="alert">' . $message . '</div>';
  }
}

// Helper function to refresh the page
function refreshPage() {
  echo '<script>window.location.reload();</script>';
}

// Helper function to redirect to another page after a delay
function redirectWithDelay($url, $delay = 2) {
  // Output HTML meta refresh tag
  echo "<meta http-equiv='refresh' content='{$delay};url={$url}'>";
}

// // Redirect after delay
// function redirectWithDelay($url, $delay = 3) {
//   // Sleep for the specified delay
//   sleep($delay);
//   // Redirect using header function
//   header("Location: $url");
//   exit(); // Make sure nothing else is executed after the redirect
// }

// Redirect without delay
function redirectWithoutDelay($url) {
  // Redirect using header function
  header("Location: $url");
  exit(); // Make sure nothing else is executed after the redirect
}

function is_password_strong($password) {
  // Check minimum length
  if (strlen($password) < 6) {
    return false;
  }

  // Check for lowercase letter
  if (!preg_match('/[a-z]/', $password)) {
    return false;
  }

  // Check for uppercase letter
  if (!preg_match('/[A-Z]/', $password)) {
    return false;
  }

  // Check for number
  if (!preg_match('/[0-9]/', $password)) {
    return false;
  }

  // Check for special symbol
  if (!preg_match('/[!@#$%^&*()_+{}|":?><~±\-=\[\];\',\.\/]/', $password)) {
    return false;
  }

  return true;
}

?>