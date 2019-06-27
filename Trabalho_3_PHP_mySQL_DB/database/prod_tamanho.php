<?php
    
    function updateCarinho($user, $prod, $guidTtamanho, $qtd, $price, $modo = 0){
        global $dblink;
        
        if($modo == 0){ // Mode de Criação        
            //Criar tamanhos
            $stmt = $dblink->prepare('INSERT INTO tamanho(guid) VALUES(?)');
            $confirm = $stmt->execute(array($guidTtamanho));
            //Criar carrinha
            $stmt = $dblink->prepare('INSERT INTO carrinha(username, produto, tamanho, qtd, price) VALUES(?, ?, ?, ?, ?)');
            $confirm = $stmt->execute(array($user, $prod, $guidTtamanho, $qtd, $price));
            
            
        }
        else{ // Mode de edição não usado
            $stmt = $dblink->prepare('UPDATE carrinha SET username = ?, produto = ?, tamanho = ?, qtd = ?, price = ? WHERE tamanho = ?');
            $confirm = $stmt->execute(array($user, $prod, $guidTtamanho, $qtd, $price, $guidTtamanho));
        }
        return $confirm;
    }

    function updateTamanho($guidTtamanho, $size, $qtd){
        global $dblink;
        
        $size = 't'.$size;
        echo "$size, $qtd, $guidTtamanho <br>";

        $stmt = $dblink->prepare("UPDATE tamanho SET $size = ? WHERE guid = ?");
        $confirm = $stmt->execute(array($qtd, $guidTtamanho));
        
        return $confirm;
    }

    function clearTamanho($guidTtamanhoguid){
        global $dblink;

        for($i = 35; $i<= 45; $i++){
            
            $size = 't'.$i;

            $stmt = $dblink->prepare("UPDATE tamanho SET $size = 0 WHERE guid = ?");
            $confirm = $stmt->execute(array($guidTtamanhoguid));
        }
        
        return $confirm;
    }

    function delLineByGuid($guid){
        global $dblink;        

        if($guid != ""){       
            $stmt = $dblink->prepare('DELETE FROM carrinha WHERE tamanho = ?');
            $confirm = $stmt->execute(array($guid));

            $stmt = $dblink->prepare('DELETE FROM tamanho WHERE guid = ?');
            $confirm = $stmt->execute(array($guid));
        }
        else $confirm = "Produto não selecionado";
        
        return $confirm;
    }

    function getTotais($user){
        $total = array('qtd'=> 0, 'val' => 0);
        if($user != ""){
            global $dblink;
            $stmt = $dblink->prepare('SELECT username, (SELECT SUM(qtd) FROM carrinha WHERE username = ?) as qtd, (SELECT SUM(qtd * price) FROM carrinha WHERE username = ?) as val FROM carrinha WHERE username = ? GROUP BY username');
            $stmt->execute(array($user,$user,$user));
            //return $stmt->fetchAll();        
            while($row = $stmt->fetch()){
                $total['qtd'] = $row['qtd'];
                $total['val'] = $row['val'];
            }
        }

        return $total;
    } 

    // include ('../config/init.php');
    // echo $_SESSION['userID'].'<br>';

    // $total=getTotais($_SESSION['userID']);

    // echo $total['qtd'];
    
?>