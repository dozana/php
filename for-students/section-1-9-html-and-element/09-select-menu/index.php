<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Select Menu</h1>

<form action="index.php" method="post" name="form1">
<?php
// Define an associative array with list menus and their options
$listMenus = array(
    "List Menu 1" => array("Option A", "Option B", "Option C"),
    "List Menu 2" => array("Option D", "Option E", "Option F"),
    "List Menu 3" => array("Option X", "Option Y", "Option Z")
);

// Loop through each list menu
foreach ($listMenus as $menuName => $options) {
    echo "<p>$menuName<br>";
    echo "<select name=\"listMenus[]\"";
    // Set size attribute for larger lists
    if (count($options) > 1) {
        echo " size=\"5\"";
    }
    // Allow multiple selections for some lists
    if (count($options) > 1) {
        echo " multiple";
    }
    echo ">";
    // Loop through options of the list menu
    foreach ($options as $option) {
        echo "<option value=\"$option\">$option</option>";
    }
    echo "</select></p><hr>";
}
?>
<input name="btnSubmit" type="submit" value="Submit">
</form>

<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["listMenus"])) {
    // Display selected values of list menus
    foreach ($_POST["listMenus"] as $selectedValue) {
        echo htmlspecialchars($selectedValue) . "<hr>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["listMenus"])) {
    // Handle case where no options are selected
    echo "No options selected.";
}
?>

</body>
</html>