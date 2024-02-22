<html>
<head>
<title>Document</title>
</head>
<body>

<h1>Forgot your password? (Input Username or Email)</h1>
<form name="form1" method="post" action="SendPassword.php">
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td> &nbsp;Username</td>
        <td>
          <input name="txtUsername" type="text" id="txtUsername">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Email</td>
        <td><input name="txtEmail" type="text" id="txtEmail">
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="btnSubmit" value="Send Password">
</form>
</body>
</html>