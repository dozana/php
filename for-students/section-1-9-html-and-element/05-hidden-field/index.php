<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Hidden Field</h1>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- Hidden input field -->
    <input type="hidden" name="secret_value" value="123456789">
    
    <!-- Submit button -->
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value of the hidden field
    $secretValue = $_POST['secret_value'];

    echo "<h3>Submitted Secret Value:</h3>";
    echo "Secret Value: $secretValue<br>";
}
?>

</body>
</html>