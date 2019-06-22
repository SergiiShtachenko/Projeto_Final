<?php
    // Config
    //include ('config/init_p.php');
    //include ('database/usersList.php');
    //$cenas='Coisas';
    //echo $cenas;
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

