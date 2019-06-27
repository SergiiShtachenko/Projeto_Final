<?php 
    include ('config/init_p.php');
    include ('models/utilizador.php');
    include ('templates/header_ad.php');
    include ('database/clientList.php');

    $listaClientsVer = getAllClients();

    
    //include ('templates/cl_produtoList.php');
    include ('templates/footer.php');
    
?>