<?php

  include ('models/cliente.php');

  $cliente = new Cliente (null, $_POST['nrcliente'], $_POST['nome'], $_POST['nif'], $_POST['morada'],$_POST['telefon'], $_POST['ativo']);


  function saveNewClient(){
    global $dblink;

    $stmt = $dblink->prepare('INSERT INTO cliente (nrcliente,nome, nif, morada, telefon) VALUES (?, ?, ?, ?, ?)');
    /* $stmt->bindParam(':nome', $cliente.getNome());
    $stmt->bindParam(':nif', $cliente.getNif());
    $stmt->bindParam(':morada', $cliente.getMorada());
    $stmt->bindParam(':telefon', $cliente.getTelefon()); */
    $stmt->execute(array($cliente.getNrCliente(), $cliente.getNomeCliente(), $cliente.getNif(), $cliente.getMorada(), $cliente.getTelefon()));

    return $stmt->fetchAll();
    
    /* while($row = $stmt->fetch()){
        $listaPr[] = new Produto($row['guid'], $row['reference'], $row['nome'], $row['descricao'], $row['foto'], $row['price'], $row['ativo']);
    }
    return $listaPr; */
  }
  saveNewClient();

  //echo $cliente;
?>