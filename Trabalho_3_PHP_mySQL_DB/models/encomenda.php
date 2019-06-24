<?php
// Classes Encomenda
class Encomenda {
    private $_guid;
    private $_dataEncomenda;
    private $_dataEntrega;
    private $_nrEncomenda;
    private $_responcavel;
    private $_cliente;
    private $_lstProdutos[];

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

?>