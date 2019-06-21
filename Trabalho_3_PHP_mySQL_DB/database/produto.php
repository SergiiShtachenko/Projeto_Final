<?php
    //database
    function getAllProdutos(){
        global $dblink;

        $stmt = $dblink->prepare('SELECT * FROM produto');
        $stmt->execute();

        //return $stmt->fetchAll();
        
        while($row = $stmt->fetch()){
            $listaPr[] = new Produto($row['guid'], $row['reference'], $row['nome'], $row['descricao'], $row['foto'], $row['price'], $row['ativo']);
        }
        return $listaPr;
    }

?>