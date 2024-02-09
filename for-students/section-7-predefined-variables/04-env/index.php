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

      <h3 class="mb-3">ENV</h3>

      <?php
      $envFile = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

      foreach ($envFile as $line) {
        list($key, $value) = explode('=', $line, 2);
        echo "$key: $value<br>";
      }

      if (isset($_ENV["USERNAME"])) {
        echo 'My username is ' . $_ENV["USERNAME"] . '<br>';
      } else {
        echo 'Username is not set<br>';
      }

      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>