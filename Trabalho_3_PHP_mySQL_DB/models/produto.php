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

    // public function __construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo){
    //     $this->_guid = $guid;
    //     $this->_ref = $ref;
    //     $this->_nome = $nome;
    //     $this->_descricao = $descricao;
    //     $this->_foto = $foto;
    //     $this->_price = $price;
    //     $this->_ativo = $ativo;
    // }

    //Guid
    public function getGuid(){ return $this->_guid; }
    public function setGuid($guid){ $this->_guid = $guid; }
    //Ref
    public function getRef(){  return $this->_ref; }
    public function setRef($_ref){ $this->_ref = $_ref; }
    //Nome
    public function getNome(){  return $this->_nome; }
    public function setNome($_nome){ $this->_nome = $_nome; }
    //Descrição
    public function getDescr(){ return $this->_descricao; }
    public function setDescr($_descricao){ $this->_descricao = $_descricao; }
    //Foto
    public function getFoto(){ return $this->_foto; }
    public function setFoto($_foto){ $this->_foto = $_foto; }
    //Preço
    public function getPrice(){ return $this->_price; }
    public function setPrice($_price){ $this->_price = $_price; }
    //Ativo
    public function getAtivo(){ return $this->_ativo; }
    public function setAtivo($_ativo){ $this->_ativo = $_ativo; }
}


// $p1 = new Produto(null, '8A01', 'Chanki', 'sapato', 'foto', 10, true);
// $p2 = new Produto(null, '8A01', 'Kuki', 'sapato', 'foto', 10, true);
// $p3 = new Produto(null, '8A01', 'Lola', 'sapato', 'foto', 10, true);
// $listaPr;

// $p1 = new Produto();
// $p1->setGuid('null');
// $p1->setRef('8A01');
// $p1->setNome('Chanki');
// $p1->setDescr('sapato');
// $p1->setFoto('foto');
// $p1->setPrice(10);
// $p1->setAtivo(true);
// $listaPr[] = $p1;
// //echo $p1->getNome() . 'ou nada';


// $p2 = new Produto();
// $p2->setGuid('null');
// $p2->setRef('8A01');
// $p2->setNome('Kuki');
// $p2->setDescr('sapato');
// $p2->setFoto('foto');
// $p2->setPrice(10);
// $p2->setAtivo(true);
// $listaPr[] = $p2;

// $p3 = new Produto();
// $p3->setGuid('null');
// $p3->setRef('8A01');
// $p3->setNome('Lola');
// $p3->setDescr('sapato');
// $p3->setFoto('foto');
// $p3->setPrice(10);
// $p3->setAtivo(true);

// $listaPr[] = $p3;

// foreach($listaPr as $item){
//     echo $item->getNome() . '<br>';
// }

?>