<?php 
include 'db_connection.php'; 
include 'functions.php';
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

      <form method="post" action="#">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Create</button>
      </form>

      <?php
        if (isset($_POST['submit'])) {
          createRecord();   
        }
      ?>

    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>

</body>
</html>