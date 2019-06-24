<?php
    // Config
    include ('config/init_p.php');

    // Models
    class Utilizador {
        protected $_guid;
        protected $_email;
        protected $_palavrapasse;
        protected $_nome;
        protected $_telefon;
        protected $_cliente;
        protected $_permissao;
        protected $_ativo;


        public function __construct($guid, $email, $palavrapasse, $nome, $telefon, $cliente, $permissao, $ativo){
            $this->_guid = $guid;
            $this->_email = $email;
            $this->_palavrapasse = $palavrapasse;
            $this->_nome = $nome;
            $this->_telefone = $telefon;
            $this->_cliente = $cliente;
            $this->_permissao = $permissao;
            $this->_ativo = $ativo;
        }

        //Guid
        public function getGuid(){ return $this->_guid; }
        //Email
        public function getEmail(){  return $this->_email; }
        //Palavrapasse
        public function getPalavraPasse(){ return $this->_palavrapasse; }
        //Nome
        public function getNome(){  return $this->_nome; }
        //Telefone
        public function getTelefon(){ return $this->_telefon; }
        //Foto
        public function getCliente(){ return $this->_cliente; }
        //Preço
        public function getPermissao(){ return $this->_permissao; }
        //Ativo
        public function getAtivo(){ return $this->_ativo; }
    }
?>    

<?php
    //database
    function getAllUtilizador(){
        //include ('../config/init_p.php');
        //include ('../models/utilizador.php');
        global $dblink;
        $stmt = $dblink->prepare('SELECT * FROM utilizador');
        $stmt->execute();

        //return $stmt->fetchAll();
        
        while($row = $stmt->fetch()){
            $listaUser[] = new Utilizador($row['guid'], $row['email'], $row['palavrapasse'], $row['nome'], $row['telefon'], $row['cliente'],  $row['permissao'], $row['ativo']);
            //$listaUser=array($row['guid'], $row["email"], $row["palavrapasse"], $row["nome"], $row["telefon"], $row["cliente"], $row["permissao"], $row["ativo"]); 
            
        
        }
        return $listaUser;
        
    }
    
?>

<?php
    //action_listar_prodytos.php

    //include
    //include   
     
    $listaUserVer = getAllUtilizador();
    //include
    //include    
?>



<!------------templates------------>

<!-------header------->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>AMF - Plataforma on-line</title>      
        <style>
        <?php echo file_get_contents("css/clients.css"); ?>
        <?php echo file_get_contents("js/clients.js"); ?>
        </style>
    </head>    
    <body>
<!-------fim header------->

<!-------lista_utilizadores.php------->
<section>
  <h1>Utilizadores</h1>
  <table id="clients">
  <tr>
  <th><input type="text" id="Nome" onkeyup="procuraNome()" placeholder="Pesquisa"></th>
  <th><input type="submit" value="Pesquisar"></th>               
  <th><a href="https://www.toworkfor.pt"><img class="twfLogoMini" src="img/ToWorkFor - Logo.jpg" alt="ToWorkFor"></a></th>
  </tr>
<?php
    
    foreach($listaUserVer as $item){
        //if($item->getAtivo()){
?>

<section class = "lstUsers">
    <table class="userList">
        <tr><td><h3><?php echo $item->getEmail(); ?></h3></td>
                <td><h3><?php echo $item->getNome(); ?></h3></td>                
                <td><h3><?php echo $item->getTelefon(); ?></h3></td>
                <td><input type="submit" value="Editar"></td>                
        </tr>
    </table>
</section>
<?php
       // }
    }
?>
<!--footer-->
    </body>
</html>