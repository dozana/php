<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Checkbox</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1">
    Please select color.<br>
    <!-- Checkbox inputs -->
    <input type="checkbox" name="chkColor1" value="Red">Red<br>
    <input type="checkbox" name="chkColor2" value="Blue">Blue<br>
    <input type="checkbox" name="chkColor3" value="Green">Green<br>
    
    <!-- Submit button -->
    <input name="btnSubmit" type="submit" value="Submit">
</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if checkboxes are selected
    if (isset($_POST['chkColor1'])) {
        $color1 = $_POST['chkColor1'];
        echo "Color 1: $color1<br>";
    }
    if (isset($_POST['chkColor2'])) {
        $color2 = $_POST['chkColor2'];
        echo "Color 2: $color2<br>";
    }
    if (isset($_POST['chkColor3'])) {
        $color3 = $_POST['chkColor3'];
        echo "Color 3: $color3<br>";
    }
}
?>

</body>
</html>