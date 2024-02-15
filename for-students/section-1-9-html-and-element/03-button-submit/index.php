<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Button Submit</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- Input field for name -->
    Enter your name: <input type="text" name="name"><br><br>
    <!-- Submit button -->
    <input type="submit" name="submit" value="Submit">
</form>

<br>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the name field is not empty
    if (!empty($_POST["name"])) {
        // Retrieve and sanitize the name input
        $name = htmlspecialchars($_POST["name"]);
        // Display a greeting message
        echo "Hello, $name!";
    } else {
        // Display an error message if the name field is empty
        echo "Please enter your name!";
    }
}
?>

</body>
</html>