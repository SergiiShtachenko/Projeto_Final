<?php

    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    //(!isset($_SESSION['username'])) die;

    
    $confirm = deleteProduto($_POST['guidPr']);

    echo $confirm;

    //echo $confirm;
    if($confirm !== false) header ('Location: produto_list_ad.php');
    else echo 'ERRO QQ' . $confirm;
    

    // if ($result !== false) {
    //     //$_SESSION['success_message'] = "Product updated succesfuly!";
    //     header ('Location: index.php?guidPr='.$prod->getGuid());
    // } else {
    //     //$_SESSION['error_message'] = "Product update failed!";
    //     header ('Location: index.php?guidPr='.$prod->getGuid());
    // }
?>