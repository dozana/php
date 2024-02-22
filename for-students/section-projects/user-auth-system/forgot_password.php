<?php require_once 'config.php'; ?>
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
      <div class="col-lg-6 col-md-6 col-sm-12">

        <div class="card mb-3">
          <div class="card-body">
            <h3 class="card-title text-center">Forgot Password</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <button type="submit" class="btn btn-primary">Reset Password</button>
              <a href="login.php" class="btn btn-link">Login</a>
            </form>
          </div>
        </div>

        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if($row) {
              // Generate a unique token for password reset
              $token = md5(uniqid(rand(), true));

              $update_sql = "UPDATE users SET reset_token='$token' WHERE email='$email'";
              mysqli_query($conn, $update_sql);

              // Send an email with the reset link containing the token
              $reset_link = "http://website.com/reset_password.php?token=$token";
              // Send the email...
              echo "Password reset link sent to your email. $reset_link";
              
            } else {
              echo "Email not found";
            }
          }
        ?>

      </div>
    </div>
  </div>

</main>

<?php include 'includes/footer.php'; ?>

<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>