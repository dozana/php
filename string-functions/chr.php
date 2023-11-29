<?php

/*

In a cybersecurity context, the chr function in PHP might be used for character manipulation or encoding, which can have applications in security-related tasks. Here's a simple example:

Suppose you are building a web application that takes user input and displays it on a webpage. To prevent potential security vulnerabilities like Cross-Site Scripting (XSS), you want to ensure that user input is properly sanitized before being rendered.

*/

function sanitize_input($input)
{
  // Remove potential malicious characters or sequences
  $sanitized = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

  // Ensure the string ends in an escape character (ASCII 27)
  $sanitized .= chr(27);

  return $sanitized;
}

// Assume user input from a form field
$user_input = '<script>alert("XSS attack!");</script>';

// Sanitize the user input to prevent XSS
$sanitized_input = sanitize_input($user_input);

// Display the sanitized input on the webpage
echo "User Input (Sanitized): $sanitized_input";
