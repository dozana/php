<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (empty(trim($_POST["txtUsername"]))) {
    echo "Please input Username!";
    exit();
}

if (empty(trim($_POST["txtPassword"]))) {
    echo "Please input Password!";
    exit();
}

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
    echo "Password not Match!";
    exit();
}

if (empty(trim($_POST["txtName"]))) {
    echo "Please input Name!";
    exit();
}

if (empty(trim($_POST["txtEmail"]))) {
    echo "Please input Email!";
    exit();
}

$username = mysqli_real_escape_string($conn, $_POST["txtUsername"]);
$password = mysqli_real_escape_string($conn, $_POST["txtPassword"]);
$name = mysqli_real_escape_string($conn, $_POST["txtName"]);
$email = mysqli_real_escape_string($conn, $_POST["txtEmail"]);
$status = 'USER';
$sid = session_id();
$active = 'No';

$sql = "SELECT * FROM member2 WHERE Username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Username already exists!";
} else {
    $sql = "INSERT INTO member2 (Username, Password, Name, Email, Status, SID, Active) VALUES ('$username', '$password', '$name', '$email', '$status', '$sid', '$active')";
    if (mysqli_query($conn, $sql)) {
        $Uid = mysqli_insert_id($conn);
        
        // Get base URL
        $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        
        // Get current directory path
        $current_dir = dirname($_SERVER['REQUEST_URI']);
        
        // Construct activation link
        $activate_link = $base_url . $current_dir . "/activate.php?sid=" . $sid . "&uid=" . $Uid;
        
        echo "<h1>Register Completed!</h1>";
        echo "Please click the following link to activate your account: <a href='" . $activate_link . "'>Activate Account</a>";

        $strTo = $_POST["txtEmail"];
        $strSubject = "Activate Member Account";
        $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
        $strHeader .= "From: abc@company.com\nReply-To: info@company.com";
        $strMessage = "";
        $strMessage .= "Welcome : " . $_POST["txtName"] . "<br>";
        $strMessage .= "=================================<br>";
        $strMessage .= "Activate account click here.<br>";
        $strMessage .= "<a href='" . $activate_link . "'>" . $activate_link . "</a><br>";
        $strMessage .= "=================================<br>";
        $strMessage .= "company.com<br>";

        $flgSend = mail($strTo, $strSubject, $strMessage, $strHeader);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
