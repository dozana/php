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
      <?php read(); ?>
    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>

</body>
</html>