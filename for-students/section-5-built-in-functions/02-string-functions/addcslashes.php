<?php

/*

Suppose you have a web application that allows users to submit comments 
or messages, and you want to ensure that any HTML or JavaScript code they 
enter is treated as plain text to prevent XSS attacks.

*/

$userComment = "<script>alert('XSS Attack!');</script>";
$escapedComment = addcslashes($userComment, '<>&"\'');
echo "User Comment: $escapedComment";
