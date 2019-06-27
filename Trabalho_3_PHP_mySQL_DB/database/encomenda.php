<?php
    include ('../config/init.php');


    function getCarrinho($user){
        global $dblink;

        $stmt = $dblink->prepare('SELECT carrinha.guid, username, produto, tamanho, qtd, carrinha.regdate,   produto.price, reference, nome, foto  FROM carrinha LEFT JOIN produto ON produto=produto.guid WHERE username = ? ORDER BY carrinha.regdate');
        $stmt->execute(array($user));

        //return $stmt->fetchAll();
        //$listaPr;
        $enc = new Encomenda();
        
        $p = new PrdTamanho();
        $p->setGuid("");

        while($row = $stmt->fetch()){
            if($p->getGuid() != $row['produto']){
                if($p->getGuid() != ""){
                    $enc->addToLstProd($p);
                    $p = new PrdTamanho();
                }
                $p->setGuidEnc($row['guid']);                 
                $p->setGuid($row['produto']);
                $p->setRef($row['reference']);
                $p->setNome($row['nome']);
                $p->setFoto($row['foto']);
                $p->setPrice($row['price']);
            }
            $p->addToLstProd($row['tamanho'], $row['qtd']);
        }

        return $enc;
    }

    $size = 35;
    $size = 't'.$size;
    echo $size;
    // $enc = new Encomenda();
    // $enc = clone(getCarrinho($_SESSION['userID']));

    // $pr = $enc->getLstProd();
    // echo $pr[0]->getGuidEnc();


    
    
?>