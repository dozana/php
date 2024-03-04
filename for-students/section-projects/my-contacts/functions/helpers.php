<?php
function clean($string) {
    return htmlentities($string ?? '', ENT_QUOTES, "");
}

function redirect($location) {
    return header("Location: {$location}");
}

function setMessage($message) {
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}

function displayMessage() {
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-secondary" role="alert">';
        echo $_SESSION['message'];
        echo '</div>';

        unset($_SESSION['message']);
    }
}

function tokenGenerator() {
    $token = md5(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token; // Store the token in the session
    return $token;
}

function validationErrors($error_message) {
    echo '<div class="alert alert-warning" role="alert">';
    echo $error_message . '<br>';
    echo '</div>';
}

function emailExists($email) {
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = query($sql);

    if (rowCount($result) == 1) {
        return true;
    } else {
        return false;
    }
}

function usernameExists($username) {
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = query($sql);

    if (rowCount($result) == 1) {
        return true;
    } else {
        return false;
    }
}
?>