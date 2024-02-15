<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Html and Table</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table width="400">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" id="name" name="name" required></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" id="email" name="email" required></td>
        </tr>
        <tr>
            <td><label for="message">Message:</label></td>
            <td><textarea id="message" name="message" rows="4" cols="30" required></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    echo "<h3>Submitted Form Data:</h3>";
    echo "<table border=\"2\" width=\"600\">";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>Name</td><td>$name</td></tr>";
    echo "<tr><td>Email</td><td>$email</td></tr>";
    echo "<tr><td>Message</td><td>$message</td></tr>";
    echo "</table>";

}
?>

</body>
</html>