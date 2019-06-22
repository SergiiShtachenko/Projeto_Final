<?php
    // Config
    include ('config/init_p.php');

    // Models
    class Cliente {
        protected $_guid;
        protected $_nrCliente;
        protected $_nomeCliente;
        protected $_nif;
        protected $_morada;
        protected $_telefon;       
        protected $_ativo;


        public function __construct($guid, $nrCliente, $nomeCliente, $nif, $morada, $telefon, $ativo){
            $this->_guid = $guid;
            $this->_nrCliente = $nrCliente;
            $this->_nomeCliente = $nomeCliente;
            $this->_nif = $nif;
            $this->_morada = $morada;
            $this->_telefon = $telefon;
            $this->_ativo = $ativo;
        }

        //Guid
        public function getGuid(){ return $this->_guid; }
        //nrCliente
        public function getNrCliente(){  return $this->_nrCliente; }
        //Nome Cliente
        public function getNomeCliente(){ return $this->_nomeCliente; }
        //Nif
        public function getNif(){  return $this->_nif; }
        //Morada
        public function getMorada(){ return $this->_morada; }
        //Telefone
        public function getTelefon(){ return $this->_telefon; }
        //Ativo
        public function getAtivo(){ return $this->_ativo; }
    }
?>

