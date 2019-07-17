<?php
    include ('config/init.php');
    include ('models/produto.php');
    include ('models/prd_tamano.php');
    include ('database/prod_tamanho.php');
    

    if (!isset($_SESSION['userID'])) die;

    //echo $_POST['guidLn'];
    delLineByGuid($_POST['guidLn']);

    header('Location: encomedna_edit.php');
?>