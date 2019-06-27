<?php 
    include ('config/init.php');
    include ('models/utilizador.php');
    include ('database/usersList.php');

    $listaUserVer = getAllUtilizador();

    
    include ('templates/header_ad.php');
    include ('templates/tpl_userList.php');
    include ('templates/footer.php');

    
    
?>