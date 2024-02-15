<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Field field upload</title>
</head>
<body>
  
<?php
// Establish a MySQLi database connection
$conn = mysqli_connect("localhost", "root", "", "test");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the selected customer ID from the form submission
$selectedCustomerID = isset($_POST["lmName1"]) ? $_POST["lmName1"] : '';

// Output the selected customer ID
echo htmlspecialchars($selectedCustomerID) . "<hr>";

// Execute SQL query to retrieve customer details based on the selected customer ID
$sql = "SELECT * FROM customer WHERE CustomerID = '" . mysqli_real_escape_string($conn, $selectedCustomerID) . "'";
$result = mysqli_query($conn, $sql);

// Fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// Output the name of the selected customer
echo htmlspecialchars($row["Name"]);

// Close the MySQLi connection
mysqli_close($conn);
?>

</body>
</html>
