<?php 
    include ('config/init.php');
    include ('models/produto.php');
    include ('database/produto.php');

    $listaVer = getAllProdutos();

    include ('templates/cl_header.php');
    include ('templates/cl_produto_list.php');
    include ('templates/footer.php');
    
?>