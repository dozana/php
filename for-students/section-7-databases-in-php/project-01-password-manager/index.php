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

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        Home
      </a>
      <a href="create.php" class="list-group-item list-group-item-action">CREATE</a>
      <a href="read.php" class="list-group-item list-group-item-action">RAED</a>
      <a href="update.php" class="list-group-item list-group-item-action">UPDATE</a>
      <a href="delete.php" class="list-group-item list-group-item-action">DELETE</a>
    </div>

    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>

</body>
</html>