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
    <div class="col-md-12">

      <h3 class="mb-3">Setting Cookies</h3>

      <?php

        // Set cookie
        $name = "SomeName";
        $value = 100;
        $expiration = time() + (60*60*24*7);
        setcookie($name, $value, $expiration);

        // Read cookie
        if(isset($_COOKIE["SomeName"])) {
          $someName = $_COOKIE["SomeName"];
          echo "Value: $someName";
        } else {
          $someName = "";
        }

      ?>
      
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>