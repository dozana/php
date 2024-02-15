<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Field field upload</title>
</head>
<body>
  
<h1>Dropdown list</h1>

<?php
// Set the default customer ID
$strDefault = "C003";

// Establish a MySQLi database connection
$conn = mysqli_connect("localhost", "root", "", "test");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute SQL query to retrieve data from the "customer" table
$sql = "SELECT * FROM customer ORDER BY CustomerID ASC";
$result = mysqli_query($conn, $sql);

// Display the form with select dropdown menu
echo '<form action="action.php" method="post" name="form1">';
echo 'List Menu<br>';
echo '<select name="lmName1">';
echo '<option value=""><-- Please Select Item --></option>';

// Fetch data and generate options dynamically
while ($row = mysqli_fetch_assoc($result)) {
    $sel = ($strDefault == $row["CustomerID"]) ? "selected" : "";
    echo '<option value="' . $row["CustomerID"] . '" ' . $sel . '>' . $row["CustomerID"] . ' - ' . $row["Name"] . '</option>';
}

echo '</select>';
echo '<input name="btnSubmit" type="submit" value="Submit">';
echo '</form>';

// Close the MySQLi connection
mysqli_close($conn);
?>

</body>
</html>
