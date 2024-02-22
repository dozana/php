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
            <h3 class="card-title text-center">Login</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="register.php" class="btn btn-link">Register</a>
              <a href="forgot_password.php" class="btn btn-link">Forgot Password</a>
            </form>
          </div>
        </div>

        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                if(password_verify($password, $row["password"])) {
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $row['role'];

                    switch($_SESSION['role']) {
                        case 'admin':
                            header("Location: admin_dashboard.php");
                            exit();
                        case 'user':
                            header("Location: user_dashboard.php");
                            exit();
                        case 'guest':
                            header("Location: guest_dashboard.php");
                            exit();
                        default:
                            echo "Unknown role";
                    }
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "User not found";
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