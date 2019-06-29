<?php

include ('../config/init.php');
  function saveNewClient(){

    

    $nomeCliente=$_POST['nome'];
    $nifCliente=$_POST['nif'];
    $moradaCliente=$_POST['Morada'];
    $telefoneCliente=$_POST['Telefone'];

    global $dblink;
    
    $stmt = $dblink->prepare("INSERT INTO cliente (nome, nif, morada, telefon) VALUES ('$nomeCliente', '$nifCliente','$moradaCliente', '$telefoneCliente');");
    
    $stmt->execute();

    return $stmt->fetchAll();
    
  
  }
  saveNewClient();

  echo "Registo criado com sucesso!";

  header ('Location: listaClientsVer.php');
?>