<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>იტალიური სკოლა - ბიბლიოთეკა</title>
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/public.css">
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">ბიბლიოთეკა</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">მთავარი</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="books.php">წიგნები</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="login.php">შესვლა</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">რეგისტრაცია</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="card mb-4">
          <div class="card-header">რეგისტრაცია</div>
          <div class="card-body">
            <form method="post" action="#">

              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="first_name" class="form-label">სახელი</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="last_name" class="form-label">გვარი</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="roll" class="form-label">როლი</label>
                <input type="text" class="form-control" id="roll" name="roll" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">ელ.ფოსტა</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">პაროლი</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">გაიმეორეთ პაროლი</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
              </div>
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">რეგისტრაცია</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</main>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>&copy; 2024 ყველა უფლება დაცულია</p>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>