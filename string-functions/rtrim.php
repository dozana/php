<?php

/*

Suppose you have a web application that allows users to sign up with a username and password. To enhance security, you want to ensure that any leading or trailing whitespace in the entered password is removed before further processing.

*/

$username = 'admin';
$password = 'pass123';

$trimmed_password = rtrim($password);
$hashed_password = hash('sha256', $trimmed_password);
$database_query = "INSERT INTO users (username, password_hash) VALUES ('$username', '$hashedPassword')";

echo "Username: $username\n";
echo "Password: $password\n";
echo "Trimmed password: $trimmed_password\n";
echo "Hashed password: $hashed_password\n";
echo "Database password: $database_query\n";
