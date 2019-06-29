<?php

    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    // Segurança
    include ('database/user.php');
    //  verifivar sessão               verificar admin
    if (!isset($_SESSION['userID']) || verifyAdmin($_SESSION['userID']) != 1){
        header ('Location: Logout.php');
        die;
    }

    
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