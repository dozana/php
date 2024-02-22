<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST['txtUsername']);
$email = mysqli_real_escape_string($conn, $_POST['txtEmail']);

$sql = "SELECT * FROM member2 WHERE Username = '$username' OR Email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (!$row) {
    echo "Not Found Username or Email!";
} else {
    echo "Your password sent successfully.<br>Send to mail : " . $row["Email"] . "<br><br>";

    $activation_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['REQUEST_URI']) . "/activate.php?sid=" . $row['SID'] . "&uid=" . $row['UserID'];

    $strTo = $row["Email"];
    $strSubject = "Your Account information username and password.";
    $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
    $strHeader .= "From: webmaster@company.com\nReply-To: webmaster@company.com";
    $strMessage = "";
    $strMessage .= "Welcome : " . $row["Name"] . "<br>";
    $strMessage .= "Username : " . $row["Username"] . "<br>";
    $strMessage .= "Password : " . $row["Password"] . "<br>";
    //$strMessage .= "Please activate your account by clicking the following link: <a href='$activation_link'>$activation_link</a><br>";
    $strMessage .= "=================================<br>";
    $strMessage .= "company.Com<br>";

    // Display email message
    echo $strMessage;

    // Uncomment this section to send email
    /*
    $flgSend = mail($strTo, $strSubject, $strMessage, $strHeader);
    if ($flgSend) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
    */
}

mysqli_free_result($result);
mysqli_close($conn);
?>
</body>
</html>
