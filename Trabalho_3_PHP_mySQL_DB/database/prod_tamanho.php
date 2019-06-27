<?php
    
    function updateCarinho($user, $prod, $tamanho, $qtd, $price, $guid = ""){
        global $dblink;
        
        if($guid == ""){ // Mode de Criação        
            $stmt = $dblink->prepare('INSERT INTO carrinha(username, produto, tamanho, qtd, price) VALUES(?, ?, ?, ?, ?)');
            $confirm = $stmt->execute(array($user, $prod, $tamanho, $qtd, $price));
        }
        else{ // Mode de edição não usado
            $stmt = $dblink->prepare('UPDATE carrinha SET username = ?, produto = ?, tamanho = ?, qtd = ?, price = ? WHERE guid = ?');
            $confirm = $stmt->execute(array($user, $prod, $tamanho, $qtd, $price, $guid));
        }
        return $confirm;
    }

    function delByGuid($guid){
        global $dblink;        

        if($guid != ""){       
            $stmt = $dblink->prepare('DELETE FROM carrinha WHERE guid = ?');
            $confirm = $stmt->execute(array($guid));
        }
        else $confirm = "Produto não selecionado";
        
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

    // include ('../config/init.php');
    // echo $_SESSION['userID'].'<br>';

    // $total=getTotais($_SESSION['userID']);

    // echo $total['qtd'];
    
?>