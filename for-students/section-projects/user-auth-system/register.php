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
            <h3 class="card-title text-center">Registration</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
              <a href="login.php" class="btn btn-link">Login</a>
            </form>
          </div>
        </div>

        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmed_password = $_POST['confirm_password'];
            $role = 'user';
            $token = md5(uniqid(rand(), true));

            if ($password !== $confirmed_password) {
              echo "Password do not match";
            } else {
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);

              $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashed_password','$role')";
              if(mysqli_query($conn, $sql)) {
                echo "Registration successful!";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
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