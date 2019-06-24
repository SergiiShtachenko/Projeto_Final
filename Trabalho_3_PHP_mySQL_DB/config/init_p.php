<?php
  session_start(); // iniciar secsão

  $dblink = new PDO('pgsql:host=localhost;port=5432;dbname=dbo_onlinePlatformAMF','postgres', 'dostup85');
  //$dblink = new PDO('pgsql:host=localhost;port=5432;dbname=dbo_onlinePlatformAMF','userAMF', '');
  //               ----------por defeito---------,       nome do base de dados,   Login   ,   pass
  $dblink->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // devolve linhas indexadas pelo nome da coluna
  $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // desligar na verção final
?>
