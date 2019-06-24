<?php
  include ('config/init_p.php');

  session_destroy();

  header ('Location: index.php');//?
?>
