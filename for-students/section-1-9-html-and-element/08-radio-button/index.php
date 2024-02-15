<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Radio Button</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1">
    Please select sex.<br>
    <!-- Radio buttonß inputs -->
    <input name="rdoSex" type="radio" value="Man">Man<br>
    <input name="rdoSex" type="radio" value="Woman">Woman<br>
    
    <!-- Submit button -->
    <input name="btnSubmit" type="submit" value="Submit">
</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which radio button is selected
    if (isset($_POST['rdoSex'])) {
        $sex = $_POST['rdoSex'];
        echo "Selected sex: $sex";
    } else {
        echo "Please select a sex.";
    }
}
?>

</body>
</html>