<?php 
    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    $listaVer = getAllProdutos();

    include ('templates/ad_header.php');
    include ('templates/ad_produto_list.php');
    include ('templates/footer.php');
    
?>