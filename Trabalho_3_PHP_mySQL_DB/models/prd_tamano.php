<?php
    // class PrdTamanho extends Produto{
    //     private $_lstTamanhos = array();

    //     public function __construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo, // artibutos do pai
    //     $t35, $t36, $t37, $t38, $t39, $t40, $t41, $t42, $t43, $t44, $t45, $t46, $t47, $t48){ // atributos do filho
    //         parent::__construct($guid, $ref, $nome, $descricao, $foto, $price, $ativo); // construir o pai
    //         $this->_lstTamanhos = array(
    //             '35' => $t35,
    //             '36' => $t36,
    //             '37' => $t37,
    //             '38' => $t38,
    //             '39' => $t39,
    //             '40' => $t40,
    //             '41' => $t41,
    //             '42' => $t42,
    //             '43' => $t43,
    //             '44' => $t44,
    //             '45' => $t45,
    //             '46' => $t46,
    //             '47' => $t47,
    //             '48' => $t48
    //         );
    //     }

    class PrdTamanho{
        private $_guidPr;
        private $_price;
        private $_lstTamanhos = array();

        public function __construct($guidPr, $_price, $t35, $t36, $t37, $t38, $t39, $t40, $t41, $t42, $t43, $t44, $t45, $t46, $t47, $t48){ 
            $this->_guidPr = $guidPr;
            $this->_price = $_price;
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
    
        public function getPrdGuid(){ return $this->_guidPr; }

        public function getPrdPrice(){ return $this->_price; }
        
        public function getLstTamanhos(){ return $this->_lstTamanhos; }

        public function getTotalQtd(){
            $total = 0;
            foreach($this->_lstTamanhos as $tamanho){
                if($tamanho != null) $total += $tamanho;
            }
            return $total;
        }

        public function getTotalVal(){ return $this->_price * $this->getTotalQtd(); }

    }    
?>