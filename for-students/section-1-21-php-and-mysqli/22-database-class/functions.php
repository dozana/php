<?php
    // Class Database
    class MyDatabase
    {
        // Database connection parameters
        private $objConnect;
        private $DB;

        // Constructor to connect to the database
        function __construct($strHost, $strDB, $strUser, $strPassword)
        {
            $this->objConnect = mysqli_connect($strHost, $strUser, $strPassword, $strDB);
            if (!$this->objConnect) {
                die("Error connecting to database: " . mysqli_connect_error());
            }
        }

        // Function to insert record
        function fncInsertRecord($strTable, $strField, $strValue)
        {
            $strSQL = "INSERT INTO $strTable ($strField) VALUES ($strValue)";
            return mysqli_query($this->objConnect, $strSQL);
        }

        // Function to select record
        function fncSelectRecord($strTable, $strCondition)
        {
            $strSQL = "SELECT * FROM $strTable WHERE $strCondition";
            $objQuery = mysqli_query($this->objConnect, $strSQL);
            return mysqli_fetch_array($objQuery);
        }

        // Function to update record
        function fncUpdateRecord($strTable, $strCommand, $strCondition)
        {
            $strSQL = "UPDATE $strTable SET $strCommand WHERE $strCondition";
            return mysqli_query($this->objConnect, $strSQL);
        }

        // Function to delete record
        function fncDeleteRecord($strTable, $strCondition)
        {
            $strSQL = "DELETE FROM $strTable WHERE $strCondition";
            return mysqli_query($this->objConnect, $strSQL);
        }

        // Destructor to close database connection
        function __destruct()
        {
            mysqli_close($this->objConnect);
        }
    }
?>
