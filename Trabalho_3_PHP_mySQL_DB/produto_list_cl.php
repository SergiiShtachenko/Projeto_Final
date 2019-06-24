<?php 
    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    $listaVer = getAllProdutos();

    include ('templates/header_cl.php');
    include ('templates/produto_list_cl.php');
    include ('templates/footer.php');
    
?>