<?php 
    include ('config/init.php');
    include ('molels/produto.php');
    include ('database/produto.php');

    $listaVer = getAllProdutos();

    include ('templates/cl_header.php');
    include ('templates/cl_produtoList.php');
    include ('templates/footer.php');
    
?>