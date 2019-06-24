<?php
    // Classes Encomenda
    class Encomenda {
        protected $_guid;
        protected $_dataEncomenda;
        protected $_dataEntrega;
        protected $_nrEncomenda;
        protected $_responcavel;
        protected $_cliente;

        public function __construct($guid, $dtEnc, $dtEntr, $nrEnc, $responsavel, $cliente){
            $this->_guid = $guid;
            $this->_dataEncomenda = $dtEnc;
            $this->_dataEntrega = $dtEntr;
            $this->_nrEncomenda = $nrEnc;
            $this->_responcavel = $responsavel;
            $this->_cliente = $cliente;
        }

        
        public function getGuid(){
            return $this->_guid;
        }
        public function getDtEnc(){
            return $this->_dataEncomenda;
        }
        public function getDtEnc(){
            return $this->_dataEncomenda;
        }
        public function getDtEntr(){
            return $this->_dataEntrega;
        }    
        public function getResponçavel(){
            return $this->_responcavel;
        }
        public function getCliente(){
            return $this->_cliente;
        }
    }
    
    // Classes Produto
    class Produto {
        protected $_guid;
        protected $_ref;
        protected $_nome;
        protected $_descricao;
        protected $_foto;
        protected $_price;
        protected $_ativo;

        public function __construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo){
            $this->_guid = $guid;
            $this->_ref = $ref;
            $this->_nome = $nome;
            $this->_descricao = $descricao;
            $this->_foto = $foto;
            $this->_price = $price;
            $this->_ativo = $ativo;
        }

        //Guid
        public function getGuid(){ return $this->_guid; }
        //Ref
        public function getRef(){  return $this->_ref; }
        //Nome
        public function getNome(){  return $this->_nome; }
        //Descrição
        public function getDescr(){ return $this->_descricao; }
        //Foto
        public function getFoto(){ return $this->_foto; }
        //Preço
        public function getPrice(){ return $this->_price; }
        //Ativo
        public function getAtivo(){ return $this->_ativo; }
    }
    
    class PrdTamanho extends Produto{
        private $_lstTamanhos = array();

        public function __construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo, // artibutos do pai
        $t35, $t36, $t37, $t38, $t39, $t40, $t41, $t42, $t43, $t44, $t45, $t46, $t47, $t48){ // atributos do filho
            parent::__construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo); // construir o pai
            $this->_lstTamanhos = array(
                '35' => $t35,
                '36' => $t36,
                '37' => $t37,
                '38' => $t38,
                '39' => $t39,
                '40' => $t40,
                '41' => $t41,
                '42' => $t42,
                '43' => $t43,
                '44' => $t44,
                '45' => $t45,
                '46' => $t46,
                '47' => $t47,
                '48' => $t48
            );
        }
    
        public function getLstTamanhos(){ return $this->_lstTamanhos; }

    }    
    

    
?>