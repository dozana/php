<?php

/*

Suppose you have a web application that allows users to submit comments or messages, and you want to remove any trailing newline characters from their input before storing it in a database. This is done to prevent potential injection attacks and ensure data integrity.

*/

// User input from a comment form
$user_comment = "It's a nice post";

// Add trailing whitespaces or newline characters
$user_comment .= "  \t\n\r\0\x0B";

// Clean up the user comment using chop to remove trailing newline characters
$cleaned_comment = chop($user_comment);

// Store the cleaned comment in the database
$database_query = "INSERT INTO comments (user_comment) VALUES ('$cleaned_comment')";

echo "User Comment: $user_comment\n";
echo "Cleaned Comment: $cleaned_comment\n";
echo "Database Query: $database_query\n";
