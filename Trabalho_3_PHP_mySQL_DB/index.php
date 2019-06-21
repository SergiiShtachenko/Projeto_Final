<?php
// Listar produto 
include ('config/init.php');

// Classes
class Produto {
    protected $_guid;
    protected $_ref;
    protected $_nome;
    protected $_descricao;
    protected $_foto;
    protected $_ativo;

    public function __construct($guid, $ref, $nome, $descricao, $foto, $ativo){
        $this->_guid = $guid;
        $this->_ref = $ref;
        $this->_nome = $nome;
        $this->_descricao = $descricao;
        $this->_foto = $foto;
        $this->_ativo = $ativo;
    }

    //Guid
    public function getGuid(){
        return $this->_guid;
    }
    //Ref
    public function getRef(){
        return $this->_ref;
    }
    //Nome
    public function getNome(){
        return $this->_nome;
    }
    
    //Descrição
    public function getDescr(){
        return $this->_descricao;
    }

    //foto
    public function getFoto(){
        return $this->_foto;
    }

    //Ativo
    public function getAtivo(){
        return $this->_ativo;
    }

}


$ppp = new Produto(null, '8A01', 'Chanki', 'sapato', 'foto', true);
$fff = $ppp->getDescr();
echo $fff;
echo $ppp->getGuid();


//database


?>