<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
<?php
    //*** By Weerachai Nukitram ThaiCreate.Com ***//

    //*** Connect MySQL ***//
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //*** Select วันที่ในตาราง Counter ว่าปัจจุบันเก็บของวันที่เท่าไหร่  ***//
    //*** ถ้าเป็นของเมื่อวานให้ทำการ Update Counter ไปยังตาราง daily และลบข้อมูล เพื่อเก็บของวันปัจจุบัน ***//
    $strSQL = "SELECT DATE FROM counter LIMIT 0,1";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);

    if ($row["DATE"] != date("Y-m-d")) {
        //*** บันทึกข้อมูลของเมื่อวานไปยังตาราง daily ***//
        $strSQL = "INSERT INTO daily (DATE,NUM) SELECT '" . date('Y-m-d',strtotime("-1 day")) . "',COUNT(*) AS intYesterday FROM counter WHERE 1 AND DATE = '" . date('Y-m-d',strtotime("-1 day")) . "'";
        mysqli_query($conn, $strSQL);

        //*** ลบข้อมูลของเมื่อวานในตาราง counter ***//
        $strSQL = "DELETE FROM counter WHERE DATE != '" . date("Y-m-d") . "'";
        mysqli_query($conn, $strSQL);
    }

    //*** Insert Counter ปัจจุบัน ***//
    $strSQL = "INSERT INTO counter (DATE,IP) VALUES ('" . date("Y-m-d") . "','" . $_SERVER["REMOTE_ADDR"] . "')";
    mysqli_query($conn, $strSQL);

    //******************** Get Counter ************************//

    // Today //
    $strSQL = "SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '" . date("Y-m-d") . "'";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    $strToday = $row["CounterToday"];

    // Yesterday //
    $strSQL = "SELECT NUM FROM daily WHERE DATE = '" . date('Y-m-d',strtotime("-1 day")) . "'";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    $strYesterday = $row["NUM"];

    // This Month //
    $strSQL = "SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '" . date('Y-m') . "'";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    $strThisMonth = $row["CountMonth"];

    // Last Month //
    $strSQL = "SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '" . date('Y-m',strtotime("-1 month")) . "'";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    $strLastMonth = $row["CountMonth"];

    // This Year //
    $strSQL = "SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '" . date('Y') . "'";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    $strThisYear = $row["CountYear"];

    // Last Year //
    $strSQL = "SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '" . date('Y',strtotime("-1 year")) . "'";
    $result = mysqli_query($conn, $strSQL);
    $row = mysqli_fetch_assoc($result);
    $strLastYear = $row["CountYear"];

    //*** Close MySQL ***//
    mysqli_close($conn);
?>

<table width="183" border="1">
  <tr>
    <td colspan="2"><div align="center">Statistics</div></td>
  </tr>
  <tr>
    <td width="98">Today</td>
    <td width="75"><div align="center"><?php echo number_format($strToday,0);?></div></td>
  </tr>
  <tr>
    <td>Yesterday</td>
    <td><div align="center"><?php echo number_format($strYesterday,0);?></div></td>
  </tr>
  <tr>
    <td>This Month </td>
    <td><div align="center"><?php echo number_format($strThisMonth,0);?></div></td>
  </tr>
  <tr>
    <td>Last Month </td>
    <td><div align="center"><?php echo number_format($strLastMonth,0);?></div></td>
  </tr>
  <tr>
    <td>This Year </td>
    <td><div align="center"><?php echo number_format($strThisYear,0);?></div></td>
  </tr>
  <tr>
    <td>Last Year </td>
    <td><div align="center"><?php echo number_format($strLastYear,0);?></div></td>
  </tr>
</table>
</body>
<html>
