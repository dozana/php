<?php
session_start();

// Check if the user is already logged in and redirect to page2.php
if(isset($_SESSION["strUser"]) && isset($_SESSION["strPass"])) {
    header("Location: page2.php");
    exit;
}

function fncAuthentication() {
	header('WWW-Authenticate: Basic realm="localhost"');
	header("HTTP/1.0 401 Unauthorized");
	exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Check if username and password are provided
	if (empty($_POST["username"]) || empty($_POST["password"])) {
		echo "Please enter username and password.";
		$error_message = "Please enter username and password.";
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];

		// Check user credentials
		$strFileName = "password.txt";
		$objFopen = fopen($strFileName, 'r');

		if ($objFopen) {
			while (!feof($objFopen)) {
				$file = fgets($objFopen, 4096);
				$Chk = explode("|", $file);
				if(trim($username) == trim($Chk[0]) && trim($password) == trim($Chk[1])) {
					$_SESSION["strUser"] = $username;
					$_SESSION["strPass"] = $password;
					fclose($objFopen);
					header("Location: page1.php");
					exit;
				}
			}
			fclose($objFopen);
		}
		
		// Authentication failed
		echo "Invalid username or password.";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Using Text File</title>
</head>
<body>
	<h1>Login Using Text File</h1>
	<?php if(isset($error_message)) echo $error_message; ?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="username">Username:</label><br>
		<input type="text" id="username" name="username"><br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
