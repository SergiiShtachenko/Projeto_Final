<?php    
include ('models/utilizador.php')

$utilizador= new Utilizador (null, $_POST['email'], $_POST['palavrapasse'], $_POST['nome'], $_POST['telefon'], $_POST['cliente'], $_POST['permissao'], $_POST['ativo'])

function saveNewUser(){
    global $dblink;

    $stmt = $dblink->prepare('INSERT INTO utilizador (email, palavrapasse, nome, telefon) VALUES (?, ?, ?, ?)');
   
    $stmt->execute(array($utilizador.getEmail(), $utilizador.getPalavraPasse(), $utilizador.getNome(), $utilizador.getTelefon()));

    return $stmt->fetchAll();
    
    
  }
  saveNewUser();

