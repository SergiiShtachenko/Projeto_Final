<?php

    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    //echo $_POST['descPr'] . ' ou nada';

    (!isset($_SESSION['username'])) die;

    $prod = new Produto(
        $_POST['guidPr'],
        $_POST['refPr'],
        $_POST['nomePr'],
        $_POST['descPr'],
        $_POST['refPr'],
        $_POST['pricePr'],
        true
    );     

    $confirm = updateProduto($prod);

    //echo $confirm;
    if($confirm !== false) header ('Location: produto_list_ad.php');
    else echo 'ERRO QQ'.$confirm;
    

    // if ($result !== false) {
    //     //$_SESSION['success_message'] = "Product updated succesfuly!";
    //     header ('Location: index.php?guidPr='.$prod->getGuid());
    // } else {
    //     //$_SESSION['error_message'] = "Product update failed!";
    //     header ('Location: index.php?guidPr='.$prod->getGuid());
    // }
?>