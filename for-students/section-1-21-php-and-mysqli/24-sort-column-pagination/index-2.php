<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Error Connect to Database: " . mysqli_connect_error());
}

$strSQL = "SELECT * FROM customer ";
$objQuery = mysqli_query($conn, $strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery);

$Per_Page = 2;   // Per Page

$Page = isset($_GET["Page"]) ? $_GET["Page"] : 1;

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
    $Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
    $Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
    $Num_Pages =($Num_Rows/$Per_Page)+1;
    $Num_Pages = (int)$Num_Pages;
}

$strSort = isset($_GET["sort"]) ? $_GET["sort"] : "CustomerID";

$strOrder = isset($_GET["order"]) ? $_GET["order"] : "ASC";

$strSQL .=" ORDER BY ".$strSort." ".$strOrder." LIMIT $Page_Start , $Per_Page";
$objQuery  = mysqli_query($conn, $strSQL);

$strNewOrder = $strOrder == 'DESC' ? 'ASC' : 'DESC';
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=CustomerID&order=<?php echo $strNewOrder?>">CustomerID</a></div></th>
    <th width="98"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Name&order=<?php echo $strNewOrder?>">Name</a></div></th>
    <th width="198"><div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Email&order=<?php echo $strNewOrder?>">Email</a></div></th>
    <th width="97"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=CountryCode&order=<?php echo $strNewOrder?>">CountryCode</a></div></th>
    <th width="59"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Budget&order=<?php echo $strNewOrder?>">Budget</a></div></th>
    <th width="71"> <div align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?sort=Used&order=<?php echo $strNewOrder?>">Used</a></div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
  </tr>
<?php
}
?>
</table>

<br>
Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
    echo " <a href='$_SERVER[PHP_SELF]?Page=$Prev_Page&sort=$strSort&order=$strOrder'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
    if($i != $Page)
    {
        echo "[ <a href='$_SERVER[PHP_SELF]?Page=$i&sort=$strSort&order=$strOrder'>$i</a> ]";
    }
    else
    {
        echo "<b> $i </b>";
    }
}
if($Page!=$Num_Pages)
{
    echo " <a href ='$_SERVER[PHP_SELF]?Page=$Next_Page&sort=$strSort&order=$strOrder'>Next>></a> ";
}

mysqli_close($conn);
?>
</body>
</html>
