<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown list</title>
</head>
<body>

<h1>Dropdown list</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1">
    List Menu<br>
    <select name="lmName1">
        <option value=""><-- Please Select Item --></option>
        <?php
        // Establish a MySQLi database connection
        $conn = mysqli_connect("localhost", "root", "", "test");

        // Execute SQL query to retrieve data from the "customer" table
        $sql = "SELECT * FROM customer ORDER BY CustomerID ASC";
        $result = mysqli_query($conn, $sql);

        // Fetch data and generate options dynamically
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["CustomerID"] . '">' . $row["CustomerID"] . ' - ' . $row["Name"] . '</option>';
        }

        // Close the MySQLi connection
        mysqli_close($conn);
        ?>
    </select>
    <input name="btnSubmit" type="submit" value="Submit">
</form

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if a valid option is selected
    if (isset($_POST["lmName1"]) && !empty($_POST["lmName1"])) {
        // Process the form submission
        $selectedCustomerID = $_POST["lmName1"];

        // Establish a MySQLi database connection
        $conn = mysqli_connect("localhost", "root", "", "test");

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Execute SQL query to retrieve customer details based on selected customer ID
        $sql = "SELECT * FROM customer WHERE CustomerID = '" . mysqli_real_escape_string($conn, $selectedCustomerID) . "'";
        $result = mysqli_query($conn, $sql);

        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the result as an associative array
            $row = mysqli_fetch_assoc($result);

            // Output the name of the selected customer
            echo "Selected Customer: " . htmlspecialchars($row["Name"]);
        } else {
            echo "No customer found with the selected ID.";
        }

        // Close the MySQLi connection
        mysqli_close($conn);
    } else {
        echo "Please select a customer.";
    }
}
?>


<br>

<p>
    <a href="index2.php">View</a>
</p>

</body>
</html>
