<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Textarea</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="txtDescription">Description:</label><br>
    <!-- Textarea field -->
    <textarea id="txtDescription" name="txtDescription" rows="4" cols="50" placeholder="Enter your description" required></textarea><br><br>
    
    <!-- Submit button -->
    <input type="submit" value="Submit">
</form>

<br>

<?php
// PHP code snippet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value of the textarea field "txtDescription" and echo it
    echo $_POST["txtDescription"];

    // Output a horizontal rule for separation
    echo "<hr>";

    // Retrieve the value of the textarea field "txtDescription", convert line breaks to <br> tags, and echo it
    echo nl2br($_POST["txtDescription"]);
}
?>

</body>
</html>