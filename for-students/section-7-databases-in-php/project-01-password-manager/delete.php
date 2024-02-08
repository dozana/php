<?php 
include 'core/db_connection.php'; 
include 'core/functions.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'inc/head.php'; ?>
</head>
<body>

<?php include 'inc/nav.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="card mb-3">
        <div class="card-body">
          <form method="post" action="delete.php">
            <div class="mb-3">
              <label for="id" class="form-label">Choose ID</label>
              <select name="id" id="id" class="form-select">
                <?php ids(); ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-sm">Delete</button>
          </form>
        </div>
      </div>
    
      <?php 
        if (isset($_POST['submit'])) {
          delete();
        }
      ?>

    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>

</body>
</html>