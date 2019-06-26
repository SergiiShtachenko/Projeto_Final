<?php
    //database
    
    function getAllProdutos(){
        global $dblink;

        $stmt = $dblink->prepare('SELECT * FROM produto ORDER BY reference');
        $stmt->execute();

        //return $stmt->fetchAll();
        //$listaPr;

        while($row = $stmt->fetch()){
            $p = new Produto();
            $p->setGuid($row['guid']);
            $p->setRef($row['reference']);
            $p->setNome($row['nome']);
            $p->setDescr($row['descricao']);
            $p->setFoto($row['foto']);
            $p->setPrice($row['price']);
            $p->setAtivo($row['ativo']);

            $listaPr[] = $p;
        }
        return $listaPr;
    }

    function getProdutoByGuid($guid){
        if($guid != ""){
            global $dblink;
            $stmt = $dblink->prepare('SELECT * FROM produto WHERE guid = ?');
            $stmt->execute(array($guid));
            //return $stmt->fetchAll();        
            while($row = $stmt->fetch()){
                $produto = new Produto();
                $produto->setGuid($row['guid']);
                $produto->setRef($row['reference']);
                $produto->setNome($row['nome']);
                $produto->setDescr($row['descricao']);
                $produto->setFoto($row['foto']);
                $produto->setPrice($row['price']);
                $produto->setAtivo($row['ativo']);;
            }
        }
        else $produto = new Produto();        


        return $produto;
    }

    function updateProduto($prod){
        global $dblink;
        move_uploaded_file($_FILES['fotoPr']['tmp_name'], 'images/produtos/'. $prod->getRef() . '.jpg');
        
        if($prod->getGuid() == ""){ // Mode de Criação        
            $stmt = $dblink->prepare('INSERT INTO produto(reference, nome, descricao, foto, price) VALUES(?, ?, ?, ?, ?)');
            $confirm = $stmt->execute(array($prod->getRef(), $prod->getNome(), $prod->getDescr(), $prod->getFoto(), $prod->getPrice()));
        }
        else{ // Mode de edição
            $stmt = $dblink->prepare('UPDATE produto SET reference = ?, nome = ?, descricao = ?, foto = ?, price = ? WHERE guid = ?');
            $confirm = $stmt->execute(array($prod->getRef(), $prod->getNome(), $prod->getDescr(), $prod->getFoto(), $prod->getPrice(), $prod->getGuid()));
        }
        return $confirm;
    }

    function deleteProduto($guid){
        global $dblink;
        

        if($guid != ""){       
            $stmt = $dblink->prepare('DELETE FROM produto WHERE guid = ?');
            $confirm = $stmt->execute(array($guid));
        }
        else $confirm = "Produto não selecionado";
        
        return $confirm;
    }

?>