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

$userID = mysqli_real_escape_string($mysqli, $_SESSION['UserID']);
$strSQL = "SELECT * FROM member WHERE UserID = '$userID'";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>

<h1>Edit Profile</h1>
<form name="form1" method="post" action="save_profile.php">
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;UserID</td>
        <td width="180">
          <?php echo htmlspecialchars($objResult["UserID"]); ?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Username</td>
        <td>
          <?php echo htmlspecialchars($objResult["Username"]); ?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo htmlspecialchars($objResult["Password"]); ?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo htmlspecialchars($objResult["Password"]); ?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;Name</td>
        <td><input name="txtName" type="text" id="txtName" value="<?php echo htmlspecialchars($objResult["Name"]); ?>"></td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td>
          <?php echo htmlspecialchars($objResult["Status"]); ?>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="Save">
</form>
</body>
</html>
<?php
mysqli_close($mysqli);
?>
