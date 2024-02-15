<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Form</h1>

<!-- <form action="Page1.php" method="post" name="form1">
  <input name="txt1" type="text">
  <input name="txt2" type="text">
  <input name="btnSubmit" type="submit" value="Submit">
</form> -->

<?php
// echo "
// <form action=\"Page2.php\" method=\"post\" name=\"form1\">
//   <input name=\"txt1\" type=\"text\">
//   <input name=\"txt2\" type=\"text\"><br>
//   Now Date/Time".date("Y-m-d H:i:s")."<br>
//   <input name=\"btnSubmit\" type=\"submit\" value=\"Submit\">
// </form>
// ";
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    echo "<h3>Submitted Form Data:</h3>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Message: $message<br>";
}
?>

</body>
</html>