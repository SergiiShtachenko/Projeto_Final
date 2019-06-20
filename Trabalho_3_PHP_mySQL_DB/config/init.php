<?php
  session_start(); // iniciar secsão

  $conn = new PDO('pgsql:host=localhost;port=5432;dbname=dbo_onlinePlatformAMF','postgres', 'dostup85');
  //              ----------por defeito---------;        nome do base de dados,  Login   ,  pass
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // devolve linhas indexadas pelo nome da coluna
  $conn
?>
