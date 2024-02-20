<?php
// Suppress deprecated warnings
error_reporting(E_ALL & ~E_DEPRECATED);

require_once("lib/nusoap.php");

// Create a new soap server
$server = new soap_server();

// Define our namespace
$namespace = "http://localhost/nusoap/index.php";
$server->wsdl->schemaTargetNamespace = $namespace;

// Configure our WSDL
$server->configureWSDL("getCustomer");

// Register our method and argument parameters
$server->register('resultCustomer', array('strCountry' => "xsd:string"), array('return' => 'xsd:string'));

// Function to fetch customer data based on country
function resultCustomer($strCountry)
{
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "test");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement with input parameter
    $stmt = mysqli_prepare($conn, "SELECT * FROM customer WHERE CountryCode LIKE ?");
    mysqli_stmt_bind_param($stmt, "s", $strCountry);
    
    // Execute SQL statement
    mysqli_stmt_execute($stmt);

    // Get result set
    $result = mysqli_stmt_get_result($stmt);

    // Fetch data into an array
    $resultArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $resultArray[] = $row;
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Return result as JSON
    return json_encode($resultArray);
}

// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// Pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);
exit();
?>
