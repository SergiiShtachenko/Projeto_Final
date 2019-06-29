<?php
    // include ('../config/init.php');
    // include ('../models/produto.php');
    // include ('../models/encomenda.php');
    // include ('../models/prd_tamano.php');

    function getCarrinho($user){
        global $dblink;

        $stmt = $dblink->prepare('SELECT produto, tamanho, carrinha.regdate,   produto.price, reference, nome, foto,  t35, t36, t37, t38, t39, t40, t41, t42, t43, t44, t45, t46, t47, t48  FROM carrinha LEFT JOIN produto ON produto=produto.guid LEFT JOIN tamanho ON tamanho.guid=tamanho  WHERE username = ? ORDER BY carrinha.regdate');
        $stmt->execute(array($user));

        //return $stmt->fetchAll();
        //$listaPr;
        $enc = new Encomenda();
        
        while($row = $stmt->fetch()){
            $p = new PrdTamanho();               
            $p->setGuid($row['produto']);
            $p->setGuidEnc($row['tamanho']);
            $p->setRef($row['reference']);
            $p->setNome($row['nome']);
            $p->setFoto($row['foto']);
            $p->setPrice($row['price']);            
            for($i = 35; $i<= 48; $i++){
                $select = 't'.$i;
                if($row[$select]>0) $p->addToLstProd($i, $row[$select]);
            }
            $enc->addToLstProd($p);
        }        

        return $enc;
    }

    function saveEnc($enc){
        global $dblink;   
        if($enc->getLstProd() != null){
            // Guardar dados da encomenda
            $stmt = $dblink->prepare('INSERT INTO encomenda(guid, dataencomenda, dataentrega, nrencomenda, responcavel, cliente) VALUES(?, ?, ?, ?, ?, ?)');
            $confirm = $stmt->execute(array($enc->getGuid(), $enc->getDtEnc(), $enc->getDtEntr(), $enc->getNrEnc(), $enc->getResponçavel(), $enc->getCliente()));
                        
            foreach($enc->getLstProd() as $item){
                saveEncProd(clone($item), $enc->getGuid());
            }

            limparCarrinho($_SESSION['userID']);
        }
        else $confirm = "Não tem itens na Encomenda";
            
        return $confirm;
    }

    function saveEncProd($p, $guidEnc){
        global $dblink;

        $stmt = $dblink->prepare('INSERT INTO enc_prod(encomenda, produto, tamanho, qtd, price) VALUES(?, ?, ?, ?, ?)');
        $confirm = $stmt->execute(array($guidEnc, $p->getGuid(), $p->getGuidEnc(), $p->getTotalQtd(), $p->getPrice()));

        return $confirm;
    }

    function limparCarrinho($guid){
        global $dblink;

        if($guid != ""){       
            $stmt = $dblink->prepare('DELETE FROM carrinha WHERE username = ?');
            $confirm = $stmt->execute(array($guid));
        }
        else $confirm = "Produto não selecionado";
        
        return $confirm;
    }

    function getAllEncomendas($cliente){
        global $dblink;

        $stmt = $dblink->prepare('SELECT encomenda.guid, dataencomenda, nrencomenda, dataentrega, utilizador.nome as utilizador_nom, cliente.nome as cleinte_nom, (SELECT COUNT(qtd) FROM enc_prod WHERE enc_prod.encomenda = encomenda.guid) AS nrmodelos, (SELECT SUM(qtd) FROM enc_prod WHERE enc_prod.encomenda = encomenda.guid) AS qtd, (SELECT SUM(qtd*price) FROM enc_prod WHERE enc_prod.encomenda = encomenda.guid) AS valor FROM encomenda LEFT JOIN utilizador ON responcavel = utilizador.guid LEFT JOIN cliente ON encomenda.cliente = cliente.guid WHERE encomenda.cliente = ? ORDER BY dataencomenda');
        //$stmt = $dblink->prepare('SELECT * FROM encomenda WHERE cliente = ?');
        $stmt->execute(array($cliente));
        

        while($row = $stmt->fetch()){
            $enc = new Encomenda();
            $enc->setGuid($row['guid']);
            $enc->setDtEnc($row['dataencomenda']);
            $enc->setNrEnc($row['nrencomenda']);
            $enc->setDtEntr($row['dataentrega']);
            $enc->setResponçavel($row['utilizador_nom']);
            $enc->setCliente($row['cleinte_nom']);

            $enc->setNrProd($row['nrmodelos']);
            $enc->setQtdProd($row['qtd']);
            $enc->setValProd($row['valor']);

            $listaEnc[] = $enc;
        }
        return $listaEnc;
    }
    

    // echo $_SESSION['idCliente'];
    // $listaVer = getAllEncomendas($_SESSION['idCliente']);
    // foreach($listaVer as $item){
    //     echo $item->getNrEnc() . '<br>';
    // }
    // $enc = clone(getCarrinho($_SESSION['userID']));

    // foreach($enc->getLstProd() as $item){
    //     $i =1;
    //     echo $item->getGuidEnc().' nr '.$i.'<br>';
    // }


    
    
?>