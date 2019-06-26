<?php
    
    class PrdTamanho extends Produto{
        private $_guidEnc;
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
        public function setGuidEnc($_guidEnc){ $this->__guidEnc = $_guidEnc; }        
        
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

    }


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