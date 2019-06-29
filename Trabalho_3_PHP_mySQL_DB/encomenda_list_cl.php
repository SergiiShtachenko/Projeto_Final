<?php
    include ('config/init.php');
    include ('models/produto.php');
    include ('models/encomenda.php');
    include ('models/prd_tamano.php');
    include ('database/encomenda.php');
    include ('database/prod_tamanho.php');
    
    $listaVer = getAllEncomendas($_SESSION['idCliente']);
    
    include ('templates/header_cl.php');
    include ('templates/encomedna_list.php');
    include ('templates/footer.php');
?>