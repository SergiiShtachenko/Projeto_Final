<?php
    
    function updateCarinho($user, $prod, $tamanho, $qtd, $price, $guid = ""){
        global $dblink;
        
        if($guid == ""){ // Mode de Criação        
            $stmt = $dblink->prepare('INSERT INTO carrinha(username, produto, tamanho, qtd, price) VALUES(?, ?, ?, ?, ?)');
            $confirm = $stmt->execute(array($user, $prod, $tamanho, $qtd, $price));
        }
        else{ // Mode de edição
            $stmt = $dblink->prepare('UPDATE carrinha SET username = ?, produto = ?, tamanho = ?, qtd = ?, price = ? WHERE guid = ?');
            $confirm = $stmt->execute(array($user, $prod, $tamanho, $qtd, $price, $guid));
        }
        return $confirm;
    }

    function getTotais($user){
        $total = array('qtd'=> 0, 'val' => 0);
        if($user != ""){
            global $dblink;
            $stmt = $dblink->prepare('SELECT (SELECT SUM(qtd) FROM carrinha) as qtd, (SELECT SUM(qtd * price) FROM carrinha) as val FROM carrinha WHERE username = ? GROUP BY username');
            $stmt->execute(array($user));
            //return $stmt->fetchAll();        
            while($row = $stmt->fetch()){
                $total['qtd'] = $row['qtd'];
                $total['val'] = $row['val'];
            }
        }

        return $total;
    } 


    // class Encomenda {
    //     private $_guid;
    //     private $_dataEncomenda;
    //     private $_dataEntrega;
    //     private $_nrEncomenda;
    //     private $_responcavel;
    //     private $_cliente;
    //     private $_lstProdutos;
    
    //     public function __construct(){
    //         $this->_guid = $this->gerarGuid();
    //         $this->_dataEncomenda = date('d-m-y');
    //     }
    
        
    //     public function getGuid(){ return $this->_guid; }
    //     public function setGuid($guid){ $this->_guid = $guid; }
    
    //     public function getDtEnc(){ return $this->_dataEncomenda; }
    //     public function SetDtEnc($data){ $this->_dataEncomenda = $data; }
    
    //     public function getDtEntr(){ return $this->_dataEntrega; }
    //     public function setDtEntr($data){ $this->_dataEntrega = $data; }
    
    //     public function getNrEnc(){ return $this->_nrEncomenda; } 
    //     public function setNrEnc($nrEnc){ $this->_nrEncomenda = $nrEnc; }   
    
    //     public function getResponçavel(){ return $this->_responcavel; }
    //     public function setResponçavel($_responcavel){ $this->_responcavel = $_responcavel; }
    
    //     public function getCliente(){ return $this->_cliente; }
    //     public function setCliente($_cliente){ $this->_cliente = $_cliente; }
    
    //     public function getLstProd(){ return $this->_lstProdutos; }
    //     public function addToLstProd($PrdTamanho){ $this->_lstProdutos[] = $PrdTamanho; }
    
    //     private function gerarGuid() { // função da nete
    //         $uuid = array(
    //          'time_low'  => 0,
    //          'time_mid'  => 0,
    //          'time_hi'  => 0,
    //          'clock_seq_hi' => 0,
    //          'clock_seq_low' => 0,
    //          'node'   => array()
    //         );
           
    //         $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
    //         $uuid['time_mid'] = mt_rand(0, 0xffff);
    //         $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
    //         $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
    //         $uuid['clock_seq_low'] = mt_rand(0, 255);
           
    //         for ($i = 0; $i < 6; $i++) {
    //          $uuid['node'][$i] = mt_rand(0, 255);
    //         }
           
    //         $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
    //          $uuid['time_low'],
    //          $uuid['time_mid'],
    //          $uuid['time_hi'],
    //          $uuid['clock_seq_hi'],
    //          $uuid['clock_seq_low'],
    //          $uuid['node'][0],
    //          $uuid['node'][1],
    //          $uuid['node'][2],
    //          $uuid['node'][3],
    //          $uuid['node'][4],
    //          $uuid['node'][5]
    //         );
           
    //         return $uuid;
    //     }
    // }
    // class PrdTamanho extends Produto{
    //     private $_guidEnc;
    //     private $_lstTamanhos = array();

    //     // public function __construct($produto){ // artibutos do pai
    //     //         //parent::__construct($guid, $ref, $nome, $descricao, $foto, $price, true); // construir o pai
    //     //         parent::setGuid($produto->getGuid());
    //     //         parent::setRef($produto->getRef());
    //     //         parent::setNome($produto->getNome());
    //     //         parent::setFoto($produto->getFoto());
    //     //         parent::setPrice($produto->getPrice());
    //     //         parent::setAtivo($produto->getAtivo());
    //     // }
            
        
    //     public function getGuidEnc(){ return $this->_guidEnc; }
    //     public function setGuidEnc($_guidEnc){ $this->__guidEnc = $_guidEnc; }        
        
    //     public function getLstTamanhos(){ return $this->_lstTamanhos; }
    //     public function addToLstProd($tamanho, $qtd){ $this->_lstTamanhos[$tamanho] = $qtd; }

    //     public function getTotalQtd(){
    //         $total = 0;
    //         foreach($this->_lstTamanhos as $tamanho){
    //             if($tamanho != null) $total += $tamanho;
    //         }
    //         return $total;
    //     }

    //     public function getTotalVal(){ return $this->_price * $this->getTotalQtd(); }

    // }

    function getCarrinho($user){
        global $dblink;

        $stmt = $dblink->prepare('SELECT username, produto, tamanho, qtd, carrinha.regdate,   produto.price, reference, nome, foto  FROM carrinha LEFT JOIN produto ON produto=produto.guid WHERE username = 'a8bcb907-896b-4426-9591-77c3cedbd71f' ORDER BY carrinha.regdate');
        $stmt->execute(array($user));

        //return $stmt->fetchAll();
        //$listaPr;
        $enc = new Encomenda();
        
        $p = new PrdTamanho();
        $p->setGuid("");

        while($row = $stmt->fetch()){
            if($p->getGuid() != $row['produto']){
                if($p->getGuid() != "") $enc->addToLstProd($p);
                $p = new PrdTamanho();
            }
            $p->setGuid($row['guid']);
            $p->setRef($row['reference']);
            $p->setNome($row['nome']);
            $p->setDescr($row['descricao']);
            $p->setFoto($row['foto']);
            $p->setPrice($row['price']);
            $p->setAtivo($row['ativo']);

            $listaPr[] = $p;
        }
        return $enc;
    }

    // $itemPedido = new PrdTamanho();

    // $itemPedido->setGuid($_POST['guid']);
    // $itemPedido->setRef($_POST['ref']);
    // $itemPedido->setNome($_POST['nome']);
    // $itemPedido->setFoto($_POST['foto']);
    // $itemPedido->setPrice($_POST['price']);

    // if($_POST['T35'] > 0) $itemPedido->addToLstProd('35', $_POST['T35']);
    // if($_POST['T36'] > 0) $itemPedido->addToLstProd('36', $_POST['T36']);
    // if($_POST['T37'] > 0) $itemPedido->addToLstProd('37', $_POST['T37']);
    // if($_POST['T38'] > 0) $itemPedido->addToLstProd('38', $_POST['T38']);
    // if($_POST['T39'] > 0) $itemPedido->addToLstProd('39', $_POST['T39']);
    // if($_POST['T40'] > 0) $itemPedido->addToLstProd('40', $_POST['T40']);
    // if($_POST['T41'] > 0) $itemPedido->addToLstProd('41', $_POST['T41']);
    // if($_POST['T42'] > 0) $itemPedido->addToLstProd('42', $_POST['T42']);
    // if($_POST['T43'] > 0) $itemPedido->addToLstProd('43', $_POST['T43']);
    // if($_POST['T44'] > 0) $itemPedido->addToLstProd('44', $_POST['T44']);
    // if($_POST['T45'] > 0) $itemPedido->addToLstProd('45', $_POST['T45']);
    // if($_POST['T46'] > 0) $itemPedido->addToLstProd('46', $_POST['T46']);
    // if($_POST['T47'] > 0) $itemPedido->addToLstProd('47', $_POST['T47']);
    // if($_POST['T48'] > 0) $itemPedido->addToLstProd('48', $_POST['T48']);

    // include ('../config/init.php');
    // echo $_SESSION['userID'].'<br>';

    // $total=getTotais($_SESSION['userID']);

    // echo $total['qtd'];
    
?>