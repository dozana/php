<?php
session_start();
if ($_SESSION['UserID'] == "") {
    echo "Please Login!";
    exit();
}

if ($_SESSION['Status'] != "ADMIN") {
    echo "This page for Admin only!";
    exit();
}

$mysqli = mysqli_connect("localhost", "root", "", "test");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$userID = mysqli_real_escape_string($mysqli, $_SESSION['UserID']);
$strSQL = "SELECT * FROM member2 WHERE UserID = '$userID'";
$result = mysqli_query($mysqli, $strSQL);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "User not found!";
    exit();
}

$objResult = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>Document</title>
</head>
<body>

<h1>Welcome to Admin Page!</h1>

  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo htmlspecialchars($objResult["Username"]); ?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo htmlspecialchars($objResult["Name"]); ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
<?php
mysqli_close($mysqli);
?>
