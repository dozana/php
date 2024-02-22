<?php require_once 'fnc/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'inc/head.php'; ?>
  </head>
<body>

<?php include 'inc/header.php'; ?>

<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="card mb-4">
          <div class="card-header">შესვლა</div>
          <div class="card-body">
            <form method="post" action="#">
              <div class="mb-3">
                <label for="email" class="form-label">ელ.ფოსტა</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">პაროლი</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary mb-3">შესვლა</button>
              </div>
            </form>
            <p>
              <a href="forgot.php">დაგავიწყდათ პაროლი ?</a><br>
              <a href="register.php">რეგისტრაცია</a>
            </p>
          </div>
        </div>

        <?php
          if (isset($_POST['submit'])) {
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput($_POST['password']);

            $query = "SELECT * FROM students WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    // Password is correct, set session and redirect to dashboard or home page
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['message'] = [
                      'text' => 'Login successful!', 
                      'type' => 'success'
                    ];
                    redirectWithDelay("dashboard.php");
                } else {
                    $_SESSION['message'] = [
                      'text' => 'Incorrect password', 
                      'type' => 'error'
                    ];
                    redirectWithoutDelay("login.php");
                }
            } else {
                $_SESSION['message'] = array('text' => 'Email not found', 'type' => 'error');
                redirectWithoutDelay("login.php");
            }
          }

          mysqli_close($conn);
        ?>
        
      </div>
    </div>
  </div>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>