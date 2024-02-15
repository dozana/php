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

      <?php
        $userId = 10;
        $firstName = "John";
        $lastName = "Doe";
        $age = 25;
      ?>

      <h3 class="mb-3">GET data in the same page</h3>
      
      <a href="index.php?id=<?php echo $userId; ?>&firstName=<?php echo $firstName; ?>&lastName=<?php echo $lastName; ?>&age=<?php echo $age; ?>">
        User Profile
      </a>

      <p>
        <?php print_r($_GET); ?>
      </p>
      
    </div>
    <div class="col-md-6">
      <h3 class="mb-3">GET data in another page</h3>
      <?php
        $title = "What is lorem ipsum ?";
        $lang = "EN";
      ?>
      <a href="second.php?lang=<?php echo $lang; ?>&title=<?php echo $title; ?>">
        Second page
      </a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>