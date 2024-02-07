<?php 
include 'db_connection.php'; 
include 'functions.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row my-4">
    <div class="col-md-6">

      <h3 class="mb-3">Delete</h3>
      <form method="post" action="index.php">

        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <select name="id" id="id" class="form-select">
            <?php showAllData(); ?>
          </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-sm mb-4">Delete</button>
      </form>

      <?php
      if(isset($_POST['submit'])) {
        deleteRecord();
      }
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>