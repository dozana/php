<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List Table Properties</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row my-4">
    <div class="col-md-6">

      <h3 class="mb-3">List Table Properties</h3>

      <?php
        $conn = mysqli_connect("localhost", "root", "", "test");

        // Check connection
        if (!$conn) {
            die("Error Connect to Database: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM my_passwords";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error Query [" . $sql . "]: " . mysqli_error($conn));
        }

        $intNumField = mysqli_num_fields($result);

        echo "<b>Table customer have $intNumField Fields.</b><br>";

        for ($i = 0; $i < $intNumField; $i++) {
            $field_info = mysqli_fetch_field_direct($result, $i);
            echo ($i + 1) . " = " . $field_info->name . " (" . $field_info->type . ")<br>";
        }

        mysqli_free_result($result);
        mysqli_close($conn);
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>