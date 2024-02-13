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

      <h3 class="mb-3">Create Record</h3>

      <form method="post" action="index.php">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input type="text" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Create</button>
      </form>

      <?php
        if(isset($_POST['submit'])) {
          $localhost = 'localhost';
          $username = 'root';
          $password = '';
          $database = 'test';

          $conn = mysqli_connect($localhost, $username, $password, $database);

          if(!$conn) {
            die("connection failed: ".mysqli_connect_error());
          }

          $title = $_POST['title'];
          $photo = $_POST['photo'];

          if(!empty($title) && !empty($photo)) {
            $sql = "INSERT INTO my_gallery(title, photo) ";
            $sql .= "VALUES ('$title', '$photo')";
  
            $result = mysqli_query($conn, $sql);
  
            if(!$result) {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            } else {
              echo "New record created successfullu.";
            }
          } else {
            echo "Fields are required";
          }
        }
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>