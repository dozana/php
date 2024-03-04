<?php
$password = '111111';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;

// $2y$10$7SXXg.FinkSapn3iUOE79OpB6xWV602Pq5h4.WQJRkV14RXdBVfDy

?>