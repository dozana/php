<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script language="JavaScript" type="text/JavaScript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
      eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0;
    }
    //-->
  </script>
</head>
<body>

<div class="container">
  <div class="row my-4">
    <div class="col-md-6">

      <h3 class="mb-3">Create Record</h3>

      <form method="post" action="index.php">
        <div class="mb-3">
          <label for="menu1" class="form-label">Select Line</label>
          <select name="Line" id="menu1" class="form-select" onChange="MM_jumpMenu('parent',this,0)">
            <?php
              for($i = 1; $i <= 10; $i++) {
                $sel = ($_GET["Line"] == $i) ? "selected" : "";
                echo "<option value=\"index.php?Line=$i\" $sel>$i</option>";
              }
            ?>
          </select>
        </div>

        <table class="table table-bordered mb-3">
          <thead>
            <tr>
              <th>Title</th>
              <th>Photo</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $line = isset($_GET["Line"]) ? $_GET["Line"] : 1;
              for ($i = 1; $i <= $line; $i++) {
                echo "<tr>";
                echo "<td><input type=\"text\" class=\"form-control\" name=\"title[]\"></td>";
                echo "<td><input type=\"text\" class=\"form-control\" name=\"photo[]\"></td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>

        <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">
          Submit
        </button>
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

          $titles = $_POST['title'];
          $photos = $_POST['photo'];

          for($i = 0; $i < count($titles); $i++) {
            $title = mysqli_real_escape_string($conn, $titles[$i]);
            $photo = mysqli_real_escape_string($conn, $photos[$i]);

            if(!empty($title) && !empty($photo)) {
              $sql = "INSERT INTO my_gallery (title, photo) VALUES ('$title', '$photo')";
              $result = mysqli_query($conn, $sql);

              if(!$result) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              } else {
                echo "New record created successfully.";
              }
            } else {
              echo "Please fill in both the title and photo fields.";
            }
          }

        }
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
