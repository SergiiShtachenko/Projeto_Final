<?php

    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    //echo $_POST['descPr'] . ' ou nada';

    //if (!isset($_SESSION['username'])) die;

    $prod = new Produto(
        $_POST['guidPr'],
        $_POST['refPr'],
        $_POST['nomePr'],
        $_POST['descPr'],
        $_POST['refPr'],
        $_POST['pricePr'],
        true
    );     

    move_uploaded_file($_FILES['fotoPr']['tmp_name'], 'images/produtos/'. $prod->getRef() . '.jpg');
    
    global $dblink;

    if($prod->getGuid() == ""){ // Mode de Criação
        echo $prod->getDescr();
        $stmt = $dblink->prepare('INSERT INTO produto(reference, nome, descricao, foto, price) VALUES(?, ?, ?, ?, ?)');
        $stmt->execute(array($prod->getRef(), $prod->getNome(), $prod->getDescr(), $prod->getFoto(), $prod->getPrice()));
    }
    // else{ // Mode de edição
    //     $stmt = $dblink->prepare('UPDATE produto SET reference = ? nome = ?, descricao = ?, foto = ?, price = ?;');
    // }
    
    


    // if ($result !== false) {
    //     //$_SESSION['success_message'] = "Product updated succesfuly!";
    //     header ('Location: index.php?guidPr='.$prod->getGuid());
    // } else {
    //     //$_SESSION['error_message'] = "Product update failed!";
    //     header ('Location: index.php?guidPr='.$prod->getGuid());
    // }
?>