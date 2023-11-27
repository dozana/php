<?php

/*

Suppose you have a web application that allows users to submit comments 
or messages, and you want to ensure that any HTML or JavaScript code they 
enter is treated as plain text to prevent XSS attacks.

For a more secure approach to prevent XSS attacks, it's generally better 
to use output encoding functions such as htmlspecialchars specifically 
designed for HTML contexts

*/

$userComment = "<script>alert('XSS Attack!');</script>";
$encodedComment = htmlspecialchars($userComment, ENT_QUOTES, 'UTF-8');
echo "User Comment: $encodedComment";
