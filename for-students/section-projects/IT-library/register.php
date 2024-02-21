<?php require_once 'fnc/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'inc/head.php'; ?>
  </head>
<body>

<?php include 'inc/header.php'; ?>

<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="card mb-4">
          <div class="card-header">რეგისტრაცია</div>
          <div class="card-body">
            <form method="post" action="">

            <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="first_name" class="form-label">სახელი</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="last_name" class="form-label">გვარი</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">ელ.ფოსტა</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
              </div>  

              <div class="mb-3">
                <label for="password" class="form-label">პაროლი</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">გაიმეორეთ პაროლი</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
              </div>
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">რეგისტრაცია</button>
              </div>
            </form>
          </div>
        </div>

        <?php
          // Check if form submitted
          if(isset($_POST['submit'])) {
              // Collect and sanitize form data
              $first_name = sanitizeInput($_POST['first_name'], $conn);
              $last_name = sanitizeInput($_POST['last_name'], $conn);
              $email = sanitizeInput($_POST['email'], $conn);
              $password = sanitizeInput($_POST['password'], $conn);
              $confirm_password = sanitizeInput($_POST['confirm_password'], $conn);

              // Check if the password is strong enough
              if (!is_password_strong($password)) {
                showMessage("პაროლი უნდა შეიცავდეს მინიმუმ 6 სიმბოლოს, მათ შორის მაღალი და დაბალი რეგისტრიის ასოებს, ციფრებს და სპეციალურ სიმბოლოებს.", 'error');
                return; // Stop further processing
              }

              // Perform some basic validation
              if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
                  showMessage("გთხოვთ შეავსოთ ყველა ველი.", 'error');
              } elseif($password !== $confirm_password) {
                  showMessage("პაროლი არ ემთხვევა.", 'error');
              } else {
                  // Check if the email already exists in the database
                  $query = "SELECT * FROM students WHERE email = '" . $email . "'";
                  $result = mysqli_query($conn, $query);

                  if(mysqli_num_rows($result) > 0) {
                      showMessage("მოცემული ელ.ფოსტა უკვე არსებობს. გთხოვთ, გამოიყენოთ სხვა ელფოსტის მისამართი.", 'error');
                  } else {
                      // Hash the password for security
                      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                      
                      // Insert data into the database
                      $insert_query = "INSERT INTO students (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

                      if(mysqli_query($conn, $insert_query)) {
                          showMessage("თქვენ წარმატებით დარეგისტრირდით.", 'success');
                          
                          redirectWithDelay("login.php", 2); // Redirect after delay
                      } else {
                          showMessage("შეცდომა: " . mysqli_error($conn), 'error');
                      }
                  }
              }

              // Close connection
              mysqli_close($conn);
          }
          ?>

      </div>
    </div>
  </div>
</main>

<?php include 'inc/footer.php'; ?>

</body>
</html>