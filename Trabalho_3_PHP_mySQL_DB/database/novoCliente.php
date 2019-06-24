<?php

  function saveNewClient(){

    include ('../config/init_p.php');

    $nomeCliente=$_POST['nome'];
    $nifCliente=$_POST['nif'];
    $moradaCliente=$_POST['Morada'];
    $telefoneCliente=$_POST['Telefone'];
    
    
    $stmt = $dblink->prepare("INSERT INTO cliente (nome, nif, morada, telefon) VALUES ('$nomeCliente', '$nifCliente','$moradaCliente', '$telefoneCliente');");
    
    $stmt->execute();

    return $stmt->fetchAll();
    
  
  }
  saveNewClient();

  echo "Registo criado com sucesso!"
?>