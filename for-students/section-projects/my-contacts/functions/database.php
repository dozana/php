<?php
function rowCount($result) {
    return mysqli_num_rows($result);
}
function escape($string) {
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    confirm($result);

    return $result;
}

function confirm($result) {
    global $conn;

    if(!$result) {
        die("Query Failed: ". mysqli_error($conn));
    }
}

function fetchArray($result) {
    global $conn;

    return mysqli_fetch_array($result);
}

/********************************************
 * Contacts - Insert
 ********************************************/

function insertRecord($conn, $table, $field, $value) {
    $strSQL = "INSERT INTO $table ($field) VALUES ($value)";
    return mysqli_query($conn, $strSQL);
}

?>
