<?php
// Classes Encomenda
// include ('produto.php');
class Encomenda {
    private $_guid;
    private $_dataEncomenda;
    private $_dataEntrega;
    private $_nrEncomenda;
    private $_responcavel;
    private $_cliente;
    private $_nrProd;
    private $_qtdProd;
    private $_valProd;
    private $_lstProdutos;

    public function __construct(){
        $this->_guid = $this->gerarGuid();
        $this->_dataEncomenda = date('d-m-y');
    }
    
    public function getGuid(){ return $this->_guid; }
    public function setGuid($guid){ $this->_guid = $guid; }

    public function getDtEnc(){ return $this->_dataEncomenda; }
    public function setDtEnc($data){ $this->_dataEncomenda = $data; }

    public function getDtEntr(){ return $this->_dataEntrega; }
    public function setDtEntr($data){ $this->_dataEntrega = $data; }

    public function getNrEnc(){ return $this->_nrEncomenda; } 
    public function setNrEnc($nrEnc){ $this->_nrEncomenda = $nrEnc; }   

    public function getResponçavel(){ return $this->_responcavel; }
    public function setResponçavel($_responcavel){ $this->_responcavel = $_responcavel; }

    public function getCliente(){ return $this->_cliente; }
    public function setCliente($_cliente){ $this->_cliente = $_cliente; }

    public function getNrProd(){ return $this->_nrProd; }
    public function setNrProd($nrProd){ $this->_nrProd = $nrProd; }

    public function getQtdProd(){ return $this->_qtdProd; }
    public function setQtdProd($qtdProd){ $this->_qtdProd = $qtdProd; }

    public function getValProd(){ return $this->_valProd; }
    public function setValProd($valProd){ $this->_valProd = $valProd; }

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

//$enc = new Encomenda('user', 'cliente');


// $p1 = new Produto();
// $p1->setNome('Chanki');
// //echo $p1->getNome() . 'ou nada';


// $p2 = new Produto();
// $p2->setNome('Kuki');
// $listaPr[] = $p2;

// $p3 = new Produto();
// $p3->setNome('Lola');

// $enc->addToLstProd($p1);
// $enc->addToLstProd($p2);
// $enc->addToLstProd($p3);

// $lstEnc = $enc->getLstProd();

// foreach($lstEnc as $item){
//     echo $item->getNome() . '<br>';
// }

?>