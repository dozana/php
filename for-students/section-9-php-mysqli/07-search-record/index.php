<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row my-4">
    <div class="col-md-12">

      <h3 class="mb-3">Search Records</h3>

      <form method="GET" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtKeyword" id="txtKeyword" placeholder="Keyword" value="<?php echo isset($_GET["txtKeyword"]) ? $_GET["txtKeyword"] : ''; ?>">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
      
      <?php
        if(isset($_GET['txtKeyword'])) {

          $hostname = "localhost";
          $username = "root";
          $password = "";
          $database = "test";
  
          $conn = mysqli_connect($hostname, $username, $password, $database);
  
          if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT * FROM my_passwords WHERE (username LIKE '%".$_GET["txtKeyword"]."%' or password LIKE '%".$_GET["txtKeyword"]."%' )";
          $result = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($result) > 0;
        
          if (!$count) { 
            echo "0 results";
          } else {
            echo '<table class="table table-striped table-hover mb-0">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th>Username</th>';
                  echo '<th>Password</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                    echo '<td>'.$row['username'].'</td>';
                    echo '<td>'.$row['password'].'</td>';
                  echo '</tr>';
                }
              echo '</tbody>';
            echo '</table>';
          }
        }
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>