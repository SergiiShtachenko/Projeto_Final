<?php 
     include ('config/init.php');

     if (!isset($_SESSION['userID'])) die;

     include ('models/produto.php');
     include ('models/encomenda.php');
     include ('models/prd_tamano.php');
     include ('database/encomenda.php');
     include ('database/prod_tamanho.php');

    $enc = new Encomenda();
    $enc = clone(getCarrinho($_SESSION['userID']));
    $enc->setNrEnc($_POST['nrEnc']);
    $enc->setDtEntr($_POST['data']);
    $enc->setResponçavel($_SESSION['userID']);
    $enc->setCliente($_SESSION['idCliente']);

    $report = saveEnc(clone($enc), 0);

    echo $report;






    

?>