<?php
    // include ('../config/init.php');
    // include ('produto.php');


    class PrdTamanho extends Produto{
        private $_guidEnc;// ref ta tabela de tamanhos
        private $_lstTamanhos = array();

        // public function __construct($produto){ // artibutos do pai
        //         //parent::__construct($guid, $ref, $nome, $descricao, $foto, $price, true); // construir o pai
        //         parent::setGuid($produto->getGuid());
        //         parent::setRef($produto->getRef());
        //         parent::setNome($produto->getNome());
        //         parent::setFoto($produto->getFoto());
        //         parent::setPrice($produto->getPrice());
        //         parent::setAtivo($produto->getAtivo());
        // }
            
        
        public function getGuidEnc(){ return $this->_guidEnc; }
        public function setGuidEnc($guidEnc){ $this->_guidEnc = $guidEnc; }
        public function setAutoGuidEnc(){ $this->_guidEnc = $this->gerarGuid(); }
        
        public function getLstTamanhos(){ return $this->_lstTamanhos; }
        public function addToLstProd($tamanho, $qtd){ $this->_lstTamanhos[$tamanho] = $qtd; }

        public function getTotalQtd(){
            $total = 0;
            foreach($this->_lstTamanhos as $tamanho){
                if($tamanho != null) $total += $tamanho;
            }
            return $total;
        }

        public function getTotalVal(){ return $this->_price * $this->getTotalQtd(); }

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

    // function updateTamanho($guidTtamanho, $size, $qtd){
    //     global $dblink;
        
    //     $size = 't'.$size;
    //     echo "$size, $qtd, $guidTtamanho <br>";

    //     $stmt = $dblink->prepare("UPDATE tamanho SET $size = ? WHERE guid = ?");
    //     $confirm = $stmt->execute(array($qtd, $guidTtamanho));
        
    //     return $confirm;
    // }
    // updateTamanho('3af6151b-b50a-453c-cfd5-504568f1ff2c', 37, 15);

    // $tam = new PrdTamanho();
    // $tam->setAutoGuidEnc();
    // $tam->getGuidEnc();

    // echo $tam->getGuidEnc();


    // $itemPedido = new PrdTamanho();
    // $itemPedido->addToLstProd('35', 1);


    // $p1 = new Produto();
    // $p1->setGuid('null');
    // $p1->setRef('8A01');
    // $p1->setNome('Chanki');
    // $p1->setDescr('sapato');
    // $p1->setFoto('foto');
    // $p1->setPrice(10);
    // $p1->setAtivo(true);

    // $tmn = new PrdTamanho($p1);
    // echo $tmn->getNome().' ou nadda';

    // $p1 = new PrdTamanho("", '8A01', 'Chanki', 'sapato', 'foto', 10);
    // $p1->addToLstProd('35', 10);
    // $p1->addToLstProd('36', 20);
    // $p1->addToLstProd('40', 15);

    // echo 'Qtd: '.$p1->getTotalQtd().'<br>';
    // echo 'Valor: '.$p1->getTotalVal().'<br>';

    // foreach($p1->getLstTamanhos() as $size => $qtd){
    //     echo "Tamanho $size tem $qtd <br>";
    // }
?>