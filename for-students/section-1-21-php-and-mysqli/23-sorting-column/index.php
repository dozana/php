<html>
<head>
<title>Document</title>
</head>
<body>

<h1>Sorting Column</h1>
<?php
$strSort = isset($_GET["sort"]) ? $_GET["sort"] : "CustomerID";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$strSQL = "SELECT * FROM customer ORDER BY ".$strSort." ASC";
$result = mysqli_query($conn, $strSQL);

if (!$result) {
    die("Error Query: " . mysqli_error($conn));
}
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=CustomerID">CustomerID</a></div></th>
    <th width="98"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Name">Name</a></div></th>
    <th width="198"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Email">Email</a></div></th>
    <th width="97"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=CountryCode">CountryCode</a></div></th>
    <th width="59"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Budget">Budget</a></div></th>
    <th width="71"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Used">Used</a></div></th>
  </tr>
<?php
while($row = mysqli_fetch_assoc($result)) {
?>
  <tr>
    <td><div align="center"><?php echo $row["CustomerID"];?></div></td>
    <td><?php echo $row["Name"];?></td>
    <td><?php echo $row["Email"];?></td>
    <td><div align="center"><?php echo $row["CountryCode"];?></div></td>
    <td align="right"><?php echo $row["Budget"];?></td>
    <td align="right"><?php echo $row["Used"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>
