<?php
    // Database connection parameters
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "test";

    // Connect to the database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to insert record
    function fncInsertRecord($conn, $strTable, $strField, $strValue) {
        $strSQL = "INSERT INTO $strTable ($strField) VALUES ($strValue)";
        return mysqli_query($conn, $strSQL);
    }

    // Function to select record
    function fncSelectRecord($conn, $strTable, $strCondition) {
        $strSQL = "SELECT * FROM $strTable WHERE $strCondition";
        $result = mysqli_query($conn, $strSQL);
        return mysqli_fetch_array($result);
    }

    // Function to update record
    function fncUpdateRecord($conn, $strTable, $strCommand, $strCondition) {
        $strSQL = "UPDATE $strTable SET $strCommand WHERE $strCondition";
        return mysqli_query($conn, $strSQL);
    }

    // Function to delete record
    function fncDeleteRecord($conn, $strTable, $strCondition) {
        $strSQL = "DELETE FROM $strTable WHERE $strCondition";
        return mysqli_query($conn, $strSQL);
    }
?>
