<?php
session_start();
if ($_SESSION['UserID'] == "") {
    echo "Please Login!";
    exit();
}

$mysqli = mysqli_connect("localhost", "root", "", "test");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
    echo "Password not Match!";
    exit();
}

$password = mysqli_real_escape_string($mysqli, trim($_POST['txtPassword']));
$name = mysqli_real_escape_string($mysqli, trim($_POST['txtName']));
$userID = mysqli_real_escape_string($mysqli, $_SESSION["UserID"]);

$strSQL = "UPDATE member2 SET Password = '$password', Name = '$name' WHERE UserID = '$userID'";
$objQuery = mysqli_query($mysqli, $strSQL);

if ($objQuery) {
    echo "Save Completed!<br>";
    
    if ($_SESSION["Status"] == "ADMIN") {
        echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
    } else {
        echo "<br> Go to <a href='user_page.php'>User page</a>";
    }
} else {
    echo "Error: " . mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>
