<?php require_once 'functions/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'includes/head.php'; ?>
  </head>
<body>

<?php include 'includes/header.php'; ?>

<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="card mb-4">
          <div class="card-body">
            
            <h4 class="mb-4">Login</h4>

            <form method="post" action="#">
              <div class="mb-3">
                <label for="txtUsername" class="form-label">Username</label>
                <input name="txtUsername" type="text" class="form-control" id="txtUsername">
              </div>
              <div class="mb-3">
                <label for="txtPassword" class="form-label">Password</label>
                <input name="txtPassword" type="password" class="form-control" id="txtPassword">
              </div>
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
              </div>
              <div class="mt-3">
                <a href="register.php">Register</a> | <a href="ForgotPassword.php">Forgot password?</a>
              </div>
            </form>

            <?php
            if(isset($_POST['submit'])) {
              $username = mysqli_real_escape_string($conn, $_POST['txtUsername']);
              $password = mysqli_real_escape_string($conn, $_POST['txtPassword']);
              
              $strSQL = "SELECT * FROM member2 WHERE Username = '$username' AND Password = '$password'";
              $result = mysqli_query($conn, $strSQL);
              
              if (!$result || mysqli_num_rows($result) === 0) {
                  echo "Username and Password Incorrect!";
              } else {
                  $objResult = mysqli_fetch_assoc($result);
                  $_SESSION["UserID"] = $objResult["UserID"];
                  $_SESSION["Status"] = $objResult["Status"];
              
                  session_write_close();
              
                  if ($objResult["Status"] == "ADMIN") {
                      header("location:admin_page.php");
                  } else {
                      header("location:user_page.php");
                  }
              }
            }
            ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>

<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>