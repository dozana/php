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

      <h3 class="mb-3">Writing to files</h3>

      <?php
        $file = "example.txt";

        if ($handle = fopen($file, "w")) {

          fwrite($handle,"What is lorem ipsum?\n\n");
          fwrite($handle,"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, commodi ipsum esse quos facilis nulla placeat distinctio, tempora maiores atque laudantium ex, quae sequi expedita deserunt eius aut nesciunt! Deleniti.");

          fclose($handle);
        } else {
          echo "The application was not able to write on the file.";
        }   
      ?>   

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>