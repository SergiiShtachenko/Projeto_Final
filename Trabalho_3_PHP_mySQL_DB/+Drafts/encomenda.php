<?php
// Listar produto 

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

function gerarGuid() { // função da nete
    $uuid = array(
     'time_low'  => 0,
     'time_mid'  => 0,
     'time_hi'  => 0,
     'clock_seq_hi' => 0,
     'clock_seq_low' => 0,
     'node'   => array()
    );
   
    $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
    $uuid['time_mid'] = mt_rand(0, 0xffff);
    $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
    $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
    $uuid['clock_seq_low'] = mt_rand(0, 255);
   
    for ($i = 0; $i < 6; $i++) {
     $uuid['node'][$i] = mt_rand(0, 255);
    }
   
    $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
     $uuid['time_low'],
     $uuid['time_mid'],
     $uuid['time_hi'],
     $uuid['clock_seq_hi'],
     $uuid['clock_seq_low'],
     $uuid['node'][0],
     $uuid['node'][1],
     $uuid['node'][2],
     $uuid['node'][3],
     $uuid['node'][4],
     $uuid['node'][5]
    );
   
    return $uuid;
}


$ppp = new Produto(null, '8A01', gerarGuid(), 'sapato', 'foto', true);
$fff = $ppp->getDescr();
// echo $fff . '<br>';
// echo $ppp->getGuid() . '<br>';

$lista;

$lista[] = new Produto(null, '8A01', 'Chanki', 'sapato', 'foto', true);

$lista[] = new Produto(null, '8A01', 'Kuki', 'sapato', 'foto', true);
$lista[] = new Produto(null, '8A01', 'Lola', 'sapato', 'foto', true);
$lista[] = $ppp;

// foreach($lista as $item){
//     echo $item->getNome() . '<br>';
// }

// Classes Encomenda
class Encomenda {
    private $_guid;
    private $_dataEncomenda;
    private $_dataEntrega;
    private $_nrEncomenda;
    private $_responcavel;
    private $_cliente;
    private $_lstProdutos;

    public function __construct($responsavel, $cliente){
        $this->_guid = gerarGuid();
        $this->_dataEncomenda = date('d-m-y');
        $this->_responcavel = $responsavel;
        $this->_cliente = $cliente;
    }

    
    public function getGuid(){ return $this->_guid; }
    public function setGuid($guid){ $this->_guid = $guid; }

    public function getDtEnc(){ return $this->_dataEncomenda; }
    public function SetDtEnc($data){ $this->_dataEncomenda = $data; }

    public function getDtEntr(){ return $this->_dataEntrega; }
    public function setDtEntr($data){ $this->_dataEntrega = $data; }

    public function getNrEnc(){ return $this->_nrEncomenda; } 
    public function setNrEnc($nrEnc){ $this->_nrEncomenda = $nrEnc; }   

    public function getResponçavel(){ return $this->_responcavel; }

    public function getCliente(){ return $this->_cliente; }

    public function getLstProd(){ return $this->_lstProdutos; }
    public function addToLstProd($PrdTamanho){ $this->_lstProdutos[] = $PrdTamanho; }

    private function gerarGuid() { // função da nete
        $uuid = array(
         'time_low'  => 0,
         'time_mid'  => 0,
         'time_hi'  => 0,
         'clock_seq_hi' => 0,
         'clock_seq_low' => 0,
         'node'   => array()
        );
       
        $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
        $uuid['time_mid'] = mt_rand(0, 0xffff);
        $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
        $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
        $uuid['clock_seq_low'] = mt_rand(0, 255);
       
        for ($i = 0; $i < 6; $i++) {
         $uuid['node'][$i] = mt_rand(0, 255);
        }
       
        $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
         $uuid['time_low'],
         $uuid['time_mid'],
         $uuid['time_hi'],
         $uuid['clock_seq_hi'],
         $uuid['clock_seq_low'],
         $uuid['node'][0],
         $uuid['node'][1],
         $uuid['node'][2],
         $uuid['node'][3],
         $uuid['node'][4],
         $uuid['node'][5]
        );
       
        return $uuid;
       }
}


// $enc = new Encomenda('user', 'cliente');

// $p1 = new Produto(null, '8A01', 'Chanki', 'sapato', 'foto', true);
// $p2 = new Produto(null, '8A01', 'Kuki', 'sapato', 'foto', true);
// $p3 = new Produto(null, '8A01', 'Lola', 'sapato', 'foto', true);

// $enc->addToLstProd($p1);
// $enc->addToLstProd($p2);
// $enc->addToLstProd($p3);

// $lstEnc = $enc->getLstProd();

// foreach($lstEnc as $item){
//     echo $item->getNome() . '<br>';
// }

function gerarGuid() { // função da nete
    $uuid = array(
     'time_low'  => 0,
     'time_mid'  => 0,
     'time_hi'  => 0,
     'clock_seq_hi' => 0,
     'clock_seq_low' => 0,
     'node'   => array()
    );
   
    $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
    $uuid['time_mid'] = mt_rand(0, 0xffff);
    $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
    $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
    $uuid['clock_seq_low'] = mt_rand(0, 255);
   
    for ($i = 0; $i < 6; $i++) {
     $uuid['node'][$i] = mt_rand(0, 255);
    }
   
    $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
     $uuid['time_low'],
     $uuid['time_mid'],
     $uuid['time_hi'],
     $uuid['clock_seq_hi'],
     $uuid['clock_seq_low'],
     $uuid['node'][0],
     $uuid['node'][1],
     $uuid['node'][2],
     $uuid['node'][3],
     $uuid['node'][4],
     $uuid['node'][5]
    );
   
    return $uuid;

    echo gerarGuid();
}


?>