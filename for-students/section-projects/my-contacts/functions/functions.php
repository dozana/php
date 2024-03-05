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



/********************************************
 * Validate Contacts
 ********************************************/
function validateContactForm() {

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $first_name = clean($_POST['first_name']);
        $last_name = clean($_POST['last_name']);
        $mobile = clean($_POST['mobile']);
        $email = clean($_POST['email']);
        $facebook = clean($_POST['facebook']);

        if(empty($first_name)) {
            $errors[] = "First Name field cannot be empty.";
        }

        if(empty($last_name)) {
            $errors[] = "Last Name field cannot be empty.";
        }

        if(empty($mobile)) {
            $errors[] = "Mobile field cannot be empty.";
        }

        if(empty($email)) {
            $errors[] = "E-Mail field cannot be empty.";
        }

        if(!empty($errors)) {
            foreach($errors as $error) {
                echo validationErrors($error);
            }
        } else {
            $table = "contacts";
            $fields = "`first_name`, `last_name`, `mobile`, `email`, `facebook`";
            $values = "'$first_name', '$last_name', '$mobile', '$email', '$facebook'";

            $result = createContact($table, $fields, $values);

            if($result) {
                setMessage("Record has been added successfully.");
                redirect("contacts-read.php");
            } else {
                setMessage("Something went wrong, your credentials are not correct.");
                redirect("contacts-read.php");
            }
        }
    }
}

function createContact($table, $fields, $values) {
    return query("INSERT INTO $table ($fields) VALUES ($values)");
}

function deleteContact($id) {
    return query("DELETE FROM contacts WHERE id = $id");
}

?>