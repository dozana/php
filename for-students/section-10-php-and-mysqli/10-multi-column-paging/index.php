<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multi Column Paging</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row my-4">
    <div class="col-md-6">

      <h3 class="mb-3">Multi Column Paging</h3>

      <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "test";
        
        $conn = mysqli_connect($hostname, $username, $password, $database);
        
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM my_gallery";
        $result = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
        $numRows = mysqli_num_rows($result);
        
        $perPage = 2; // Per Page
        
        $page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
        
        $prevPage = $page - 1;
        $nextPage = $page + 1;
        
        $pageStart = max((($perPage * $page) - $perPage), 0); // $pageStart is always 0 or a positive integer.
        if ($numRows <= $perPage) {
            $numPages = 1;
        } elseif (($numRows % $perPage) == 0) {
            $numPages = ($numRows / $perPage);
        } else {
            $numPages = ($numRows / $perPage) + 1;
            $numPages = (int)$numPages;
        }
        
        $sql .= " ORDER BY id ASC LIMIT $pageStart , $perPage";
        $result = mysqli_query($conn, $sql);

        if (!$numRows) { 
          echo "0 results";
        } else {
          echo '<table class="table table-striped table-hover mb-0">';
          echo '<tbody>';
          echo '<tr>';
            $intRows = 0;

            while ($row = mysqli_fetch_array($result)) {

              echo '<td>'. ++$intRows .'</td>';
              echo '<td>'.$row['title'].'</td>';
              echo '<td><img src="img/'. $row["photo"] .'" width=150></td>';

              if(($intRows) % 2 == 0) {
                echo"</tr>";
              }
            }
          echo '</tr>';
          echo '</tbody>';
          echo '</table>';
        }
        ?>
    
        Total <?php echo $numRows;?> Record : <?php echo $numPages;?> Page :
        <?php
        if ($prevPage) {
            echo " <a href='$_SERVER[SCRIPT_NAME]?page=$prevPage'><< Back</a> ";
        }

        for ($i = 1; $i <= $numPages; $i++) {
            if ($i != $page) {
                echo "[ <a href='$_SERVER[SCRIPT_NAME]?page=$i'>$i</a> ]";
            } else {
                echo "<b> $i </b>";
            }
        }
        if ($page != $numPages) {
            echo " <a href ='$_SERVER[SCRIPT_NAME]?page=$nextPage'>Next>></a> ";
        }
        mysqli_close($conn);
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>