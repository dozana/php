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

      <h3 class="mb-3">Requset</h3>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="password" class="form-control" id="lastName" name="lastName">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Submit</button>
      </form>

      <?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        
        echo "First Name: $firstName <br>";
        echo "Last Name: $lastName <br>";

        echo "<hr>";

        foreach($_REQUEST as $key => $val) {
          echo $key . ' : ' . $val . '<br>'; 
        }
      }

      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>