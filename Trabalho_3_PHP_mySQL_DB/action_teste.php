<?php
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

    echo $_POST['Produto']->getDescr;
?>