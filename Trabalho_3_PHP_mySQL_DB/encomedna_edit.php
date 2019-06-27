<?php
    include ('config/init.php');
    include ('models/produto.php');
    include ('models/encomenda.php');
    include ('models/prd_tamano.php');
    include ('database/encomenda.php');
    include ('database/prod_tamanho.php');

    $enc = new Encomenda();
    $enc = clone(getCarrinho($_SESSION['userID']));
    
    include ('templates/header_cl.php');
    include ('templates/encomedna_edit.php');
    include ('templates/footer.php');
?>
