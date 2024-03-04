<?php
function loginUser($email, $password) {
    $sql = "SELECT * FROM users WHERE email='".escape($email)."'";
    $result = query($sql);

    if(rowCount($result) == 1) {
        $row = fetchArray($result);
        $db_password = $row['password'];
        $db_first_name = $row['first_name'];
        $db_last_name = $row['last_name'];

        if(password_verify($password, $db_password)) {
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name;

            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/********************************************
 * User Login Validation
 ********************************************/
function validateUserLogin() {

    $errors = [];

    $min = 2;
    $max = 50;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);

        if(empty($email)) {
            $errors[] = "E-Mail field cannot be empty.";
        }

        if(empty($password)) {
            $errors[] = "Password field cannot be empty.";
        }

        if(!empty($errors)) {
            foreach($errors as $error) {
                echo validationErrors($error);
            }
        } else {
            if(loginUser($email, $password)) {
                redirect("dashboard.php");
            } else {
                setMessage("Something went wrong, your credentials are not correct.");
                redirect("login.php");
            }
        }
    }
}

/********************************************
 * Logged In
 ********************************************/
function loggedIn() {
    if(isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}

?>