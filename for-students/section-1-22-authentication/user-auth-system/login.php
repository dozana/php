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
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">Login</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="register.php" class="btn btn-link">Register</a>
            </form>
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