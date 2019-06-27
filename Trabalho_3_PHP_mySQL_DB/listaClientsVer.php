<?php 
    include ('config/init.php');
    include ('models/cliente.php');   
    include ('database/clientList.php');

    $listaClientsVer = getAllClients();

    include ('templates/header_ad.php');
    include ('templates/tpl_clientsList.php');
    include ('templates/footer.php');
    
?>