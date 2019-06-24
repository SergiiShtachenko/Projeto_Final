<?php    

function saveNewUser(){
  include ('config/init_p.php');

 
  $email=$_POST['email'];
  $palavrapasse=$_POST['password'];
  $nome=$_POST['nome'];
  $nifEmpresa=$_POST['nif'];
  $telefone=$_POST['Telefone'];
 

  //teste se passa valores para página
  //echo $email, $palavrapasse, $nome, $telefone;
  
  $stmt = $dblink->prepare("INSERT INTO utilizador(email, palavrapasse, nome, telefon, cliente, permissao) VALUES('$email', md5('$palavrapasse'), '$nome', '$telefone', (SELECT guid FROM cliente WHERE nif = '$nifEmpresa'), 0);");
  
  
  $stmt->execute();

  return $stmt->fetchAll(); 
  
  
}

saveNewUser();
echo "Registo criado com sucesso!";
?>