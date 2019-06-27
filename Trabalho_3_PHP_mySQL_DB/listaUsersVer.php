<?php 
    include ('config/init_p.php');
    include ('models/utilizador.php');
    include ('templates/header_ad.php');
    include ('database/usersList.php');

    $listaUserVer = getAllUtilizador();

    
    //include ('templates/cl_produtoList.php');
    include ('templates/footer.php');
    
?>