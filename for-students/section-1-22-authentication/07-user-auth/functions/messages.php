<?php

if (isset($_SESSION['message'])) {
  showMessage($_SESSION['message']['text'], $_SESSION['message']['type']);
  unset($_SESSION['message']);
}

?>