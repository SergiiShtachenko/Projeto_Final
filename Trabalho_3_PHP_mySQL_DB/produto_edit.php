<?php 
    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    $prod = getProdutoByGuid($_POST['guidPr']);

    include ('templates/header_ad.php');
    include ('templates/produto_edit.php');
    include ('templates/footer.php');        
    
    //cho $_POST['guidPr'] . ' ou nada';
?>