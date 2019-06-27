<?php
    include ('config/init.php');
    include ('models/produto.php');
    include ('models/prd_tamano.php');
    include ('database/prod_tamanho.php');

    echo $_POST['guidLn'];
    delLineByGuid($_POST['guidLn']);

    header('Location: encomedna_edit.php');
?>