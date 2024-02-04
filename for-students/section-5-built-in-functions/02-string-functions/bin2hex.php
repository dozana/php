<?php

/*

Suppose you have a web application that stores user passwords as hashed values using a secure hashing algorithm like SHA-256. Storing the hashes in hexadecimal format instead of raw binary can have advantages, and bin2hex can be part of this process.

In this example, the user's password is hashed using the SHA-256 algorithm, resulting in a binary hash. bin2hex is then used to convert this binary hash into a hexadecimal string, which is commonly used for storing and comparing password hashes in databases.

This conversion to hexadecimal format can make it easier to handle and store the hash securely. It's important to note that secure password storage also involves salting (adding a random value to each password before hashing) and using a slow hashing algorithm (to mitigate brute force attacks). Additionally, storing passwords and sensitive information in a database requires careful handling, including the use of prepared statements to prevent SQL injection.

*/

$username = 'admin';
$user_password = 'password123';

$hashed_password = hash('sha256', $user_password);
$hex_hashed_password = bin2hex($hashed_password);

$database_query = "INSERT INTO users (username, password_hash) VALUES ('$username', '$hex_hashed_password')";

echo "------\n";
echo "Hashed Password: $hashed_password\n";
echo "Hex Hashed Password: $hex_hashed_password\n";
echo "Database Query: $database_query\n";
echo "------\n";
