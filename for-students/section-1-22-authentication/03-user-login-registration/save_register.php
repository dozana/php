<?php
$mysqli = mysqli_connect("localhost", "root", "", "test");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (trim($_POST["txtUsername"]) == "") {
    echo "Please input Username!";
    exit();
}

if (trim($_POST["txtPassword"]) == "") {
    echo "Please input Password!";
    exit();
}

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
    echo "Password not Match!";
    exit();
}

if (trim($_POST["txtName"]) == "") {
    echo "Please input Name!";
    exit();
}

$username = mysqli_real_escape_string($mysqli, $_POST["txtUsername"]);
$password = mysqli_real_escape_string($mysqli, $_POST["txtPassword"]);
$name = mysqli_real_escape_string($mysqli, $_POST["txtName"]);
$status = mysqli_real_escape_string($mysqli, $_POST["ddlStatus"]);

$strSQL = "SELECT * FROM member WHERE Username = '$username'";
$result = mysqli_query($mysqli, $strSQL);
$objResult = mysqli_fetch_array($result);
if ($objResult) {
    echo "Username already exists!";
} else {
    $strSQL = "INSERT INTO member (Username,Password,Name,Status) VALUES ('$username', '$password', '$name', '$status')";
    $result = mysqli_query($mysqli, $strSQL);

    if ($result) {
        echo "Register Completed!<br>";
        echo "<br> Go to <a href='login.php'>Login page</a>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>
