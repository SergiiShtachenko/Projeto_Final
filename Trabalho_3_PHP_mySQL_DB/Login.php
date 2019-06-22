<?php
  include ('config/init_p.php');
  include ('database/usersList.php'); //?

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (verifyUser($username, $password)) {
    $_SESSION['username'] = $username;
  }

  header ('Location: ' . $_SERVER['HTTP_REFERER']); //?
?>
