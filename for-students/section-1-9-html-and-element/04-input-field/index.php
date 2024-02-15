<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Input Field</h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- Text input field -->
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter your username" required><br><br>
    
    <!-- Email input field -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>
    
    <!-- Password input field -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>
    
    <!-- Submit button -->
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "<h3>Submitted Form Data:</h3>";
    echo "Username: $username<br>";
    echo "Email: $email<br>";
    // For security reasons, it's better not to display the password in plain text
}
?>

</body>
</html>