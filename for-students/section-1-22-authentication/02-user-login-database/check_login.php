<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "test");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$username = mysqli_real_escape_string($mysqli, $_POST['txtUsername']);
$password = mysqli_real_escape_string($mysqli, $_POST['txtPassword']);

$strSQL = "SELECT * FROM member WHERE Username = '$username' AND Password = '$password'";
$result = mysqli_query($mysqli, $strSQL);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Username and Password Incorrect!";
} else {
    $objResult = mysqli_fetch_assoc($result);
    $_SESSION["UserID"] = $objResult["UserID"];
    $_SESSION["Status"] = $objResult["Status"];

    session_write_close();

    if ($objResult["Status"] == "ADMIN") {
        header("location:admin_page.php");
    } else {
        header("location:user_page.php");
    }
}

mysqli_close($mysqli);
?>
